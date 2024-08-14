<?php
require_once('dbconfig.php');
define('SALT_LENGTH', 9);
class DBHelper
{

    private $conn;
    public function __construct()
    {

        $database = new Database();
        $conn = $database->dbConnection();
        $this->conn = $conn;
    }

    public function runQuery($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }


    public function PwdHash($pwd, $salt = null)
    {
        if ($salt === null) {
            $salt = substr(md5(uniqid(rand(), true)), 0, SALT_LENGTH);
        } else {
            $salt = substr($salt, 0, SALT_LENGTH);
        }
        return $salt . sha1($pwd . $salt);
    }

    public function generate_password($length = 20)
    {
        $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' .
            '0123456789=!@#$%&*';

        $str = '';
        $max = strlen($chars) - 1;

        for ($i = 0; $i < $length; $i++)
            $str .= $chars[random_int(6, $max)];

        return $str;
    }

    /*
     * Returns rows from the database based on the conditions
     * @param string name of the table
     * @param array select, where, order_by, limit and return_type conditions
     */
    public function getRows($table, $conditions = array())
    {
        $sql = 'SELECT';
        $sql .= array_key_exists("select", $conditions) ? $conditions['select'] : '*';
        $sql .= ' FROM ' . $table;
        if (array_key_exists("where", $conditions)) {
            $sql .= ' WHERE ';
            $i = 0;
            foreach ($conditions['where'] as $key => $value) {
                $pre = ($i > 0) ? ' AND ' : '';
                $sql .= $pre . $key . " = '" . $value . "'";
                $i++;
            }
        }

        if (array_key_exists("order_by", $conditions)) {
            $sql .= ' ORDER BY ' . $conditions['order_by'];
        }

        if (array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)) {
            $sql .= ' LIMIT ' . $conditions['start'] . ',' . $conditions['limit'];
        } elseif (!array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)) {
            $sql .= ' LIMIT ' . $conditions['limit'];
        }

        $query = $this->conn->prepare($sql);
        $query->execute();

        if (array_key_exists("return_type", $conditions) && $conditions['return_type'] != 'all') {
            switch ($conditions['return_type']) {
                case 'count':
                    $data = $query->rowCount();
                    break;
                case 'single':
                    $data = $query->fetch(PDO::FETCH_ASSOC);
                    break;
                default:
                    $data = '';
            }
        } else {
            if ($query->rowCount() > 0) {
                $data = $query->fetchAll();
            }
        }
        return !empty($data) ? $data : false;
    }

    /*
     * Insert data into the database
     * @param string name of the table
     * @param array the data for inserting into the table
     */
    public function insert($table, $data)
    {
        try {
            if (!empty($data) && is_array($data)) {
                $columns = '';
                $values = '';
                $i = 0;
                // if (!array_key_exists('createdDate', $data)) {
                //     $data['createdDate'] = date("Y-m-d H:i:s");
                // }
                // if (!array_key_exists('modifiedDate', $data)) {
                //     $data['modifiedDate'] = date("Y-m-d H:i:s");
                // }

                // if (!array_key_exists('createdBy', $data)) {
                //     $data['createdBy'] = $_SESSION['id_session'];
                // }

                // if (!array_key_exists('modifiedBy', $data)) {
                //     $data['modifiedBy'] = $_SESSION['id_session'];
                // }

                $columnString = implode(',', array_keys($data));
                $valueString = ":" . implode(',:', array_keys($data));
                $sql = "INSERT INTO " . $table . " (" . $columnString . ") VALUES (" . $valueString . ")";
                $query = $this->conn->prepare($sql);
                foreach ($data as $key => $val) {
                    $query->bindValue(':' . $key, $val);
                }
                $insert = $query->execute();
                return $insert ? $this->conn->lastInsertId() : false;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /*
     * Update data into the database
     * @param string name of the table
     * @param array the data for updating into the table
     * @param array where condition on updating data
     */
    public function update($table, $data, $conditions)
    {
        try {
            if (!empty($data) && is_array($data)) {
                $colvalSet = '';
                $whereSql = '';
                $i = 0;
                if (!array_key_exists('createdDate', $data)) {
                    $data['createdDate'] = date("Y-m-d H:i:s");
                }
                if (!array_key_exists('modifiedDate', $data)) {
                    $data['modifiedDate'] = date("Y-m-d H:i:s");
                }

                if (!array_key_exists('createdBy', $data)) {
                    $data['createdBy'] = $_SESSION['id_session'];
                }

                if (!array_key_exists('modifiedBy', $data)) {
                    $data['modifiedBy'] = $_SESSION['id_session'];
                }
                foreach ($data as $key => $val) {
                    $pre = ($i > 0) ? ', ' : '';
                    $colvalSet .= $pre . $key . "='" . $val . "'";
                    $i++;
                }
                if (!empty($conditions) && is_array($conditions)) {
                    $whereSql .= ' WHERE ';
                    $i = 0;
                    foreach ($conditions as $key => $value) {
                        $pre = ($i > 0) ? ' AND ' : '';
                        $whereSql .= $pre . $key . " = '" . $value . "'";
                        $i++;
                    }
                }
                $sql = "UPDATE " . $table . " SET " . $colvalSet . $whereSql;
                $query = $this->conn->prepare($sql);
                $update = $query->execute();
                return $update ? $query->rowCount() : false;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /*
     * Delete data from the database
     * @param string name of the table
     * @param array where condition on deleting data
     */
    public function delete($table, $conditions)
    {
        $whereSql = '';
        if (!empty($conditions) && is_array($conditions)) {
            $whereSql .= ' WHERE ';
            $i = 0;
            foreach ($conditions as $key => $value) {
                $pre = ($i > 0) ? ' AND ' : '';
                $whereSql .= $pre . $key . " = '" . $value . "'";
                $i++;
            }
        }
        $sql = "DELETE FROM " . $table . $whereSql;
        $delete = $this->conn->exec($sql);
        return $delete ? $delete : false;
    }



    public function doLogin($uname, $upass)
    {
        try {
            $stmt = $this->conn->prepare('SELECT * FROM credentials  WHERE Email=:Email');
            $stmt->execute(array(':Email' => $uname));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['Status'] = $userRow['Status'];

            if ($stmt->rowCount() > 0) {
                if ($userRow['Status'] == 1) {
                    if ($userRow['Email'] === $userRow['Email']) {
                        $_SESSION['Password'] = $this->PwdHash($upass, substr($userRow['Password'], 0, 9));
                        $_SESSION['Role'] = $userRow['Role'];
                        $_SESSION['ActiveUser'] = $userRow['LoginID'];
                  
                        return true;
                    }
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



    public function redirect($url)
    {
        header("Location: $url");
    }

    public function doLogout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }

    public function getData($table, $attrName, $id, $id2)
    {
        $query = $this->getRows($table, ['where' => [ $id => $id2 ], ' order_by' => ' courseID ASC' ]);
        if (!empty($query)) {
            foreach ($query as  $q) {
                $attrName = $q[$attrName];
                return $attrName;
            }
        } else {
            return null;
        }
    }



    public function getLastRow($table)
    {
        $sql = $this->conn->prepare('SELECT * from ' . $table);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllData($query, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getlastId()
    {
        $stmt = $this->conn->prepare('SELECT leave_id FROM xpc_leave order by leave_id desc limit 1');
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_COLUMN);
        return $results;
    }

    
}
