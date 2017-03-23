<?php
require_once('dbconfig.php');
class Tests
{
    public $pdo;

    public function __construct()
    {
        $database = new DatabaseConnect();
        $db = $database->dbConnection();
        $this->pdo = $db;
    }

    function __destruct(){
        unset($this->pdo);
    }

    private function dbRow($data){
        $arr = [];
        $row = $data->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    private function db2Arr($data){
        $arr = [];
        while ($row = $data->fetch(PDO::FETCH_ASSOC))
            $arr[] = $row;
        return $arr;
    }
    function createTest($test_name){
        $sql = "INSERT INTO test(test_name) VALUES (?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $test_name, PDO::PARAM_STR);
        return $stmt->execute();
    }
    function getIdTest($test_name){
        $sql = "SELECT *
                FROM test
                WHERE test_name='$test_name'";
        $res = $this->pdo->query($sql);
        if (!$res) return false;
        return $this->dbRow($res);
    }

    function createQuestion($question,$parent_test){
        $sql = "INSERT INTO questions(question,parent_test) VALUES (?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $question, PDO::PARAM_STR);
        $stmt->bindParam(2, $parent_test, PDO::PARAM_INT);
        return $stmt->execute();
    }

    function getIdQuestion($question_name){
        $sql = "SELECT *
                FROM questions
                WHERE question='$question_name'";
        $res = $this->pdo->query($sql);
        if (!$res) return false;
        return $this->dbRow($res);
    }
    function setAnswer($answer,$parent_question,$correct_answer){
        $sql = "INSERT INTO answers(answer,parent_question,correct_answer) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $answer, PDO::PARAM_STR);
        $stmt->bindParam(2, $parent_question, PDO::PARAM_INT);
        $stmt->bindParam(3, $correct_answer, PDO::PARAM_STR);
        return $stmt->execute();
    }

    function getTests(){
        $sql = "SELECT *
                FROM test";
        $res = $this->pdo->query($sql);
        if (!$res) return false;
        return $this->db2Arr($res);
    }



    function get_test_data($test_id){
        if( !$test_id ) return;

        $sql  = "SELECT q.question, q.parent_test, a.id, a.answer, a.parent_question
		FROM questions q
		LEFT JOIN answers a
			ON q.id = a.parent_question
				WHERE q.parent_test = $test_id";
        $res = $this->pdo->query($sql);


        if (!$res) return false;


        $data = null;

        while( $row = $res->fetch(PDO::FETCH_ASSOC)){
            if( !$row['parent_question'] ) return false;
            $data[$row['parent_question']][0] = $row['question'];
            $data[$row['parent_question']][$row['id']] = $row['answer'];
        }
        return $data;
    }


    function getCorrectAnswer($id){
        $sql = "SELECT *
                FROM answers
                WHERE id='$id' AND correct_answer = '1' ";
        $res = $this->pdo->query($sql);
        if (!$res) return false;
        return $this->dbRow($res);
    }

    function getTestName($id){
        $sql = "SELECT *
                FROM test
                WHERE id='$id'";
        $res = $this->pdo->query($sql);
        if (!$res) return false;
        return $this->dbRow($res);
    }
    function setResult($user_name,$test_name,$result){
        $sql = "INSERT INTO results(user_name,test_name,result) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $user_name, PDO::PARAM_STR);
        $stmt->bindParam(2, $test_name, PDO::PARAM_STR);
        $stmt->bindParam(3, $result, PDO::PARAM_INT);
        return $stmt->execute();
    }
    function getResults(){
        $sql = "SELECT *
                FROM results
                ORDER BY id DESC";
        $res = $this->pdo->query($sql);
        if (!$res) return false;
        return $this->db2Arr($res);
    }
    function getUserResults($user_name){
        $sql = "SELECT *
                FROM results
                WHERE user_name ='$user_name'
                ORDER BY id DESC";
        $res = $this->pdo->query($sql);
        if (!$res) return false;
        return $this->db2Arr($res);
    }
    function editQuestion($id,$text){
        $sql = "UPDATE questions
                SET question = ?
                WHERE id = ?
                ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $text, PDO::PARAM_STR);
        $stmt->bindParam(2, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    function editAnswer($id,$text,$answer){
        $sql = "UPDATE answers
                SET answer = ?, correct_answer = ?
                WHERE id = ?
                ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $text, PDO::PARAM_STR);
        $stmt->bindParam(2, $answer, PDO::PARAM_STR);
        $stmt->bindParam(3, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    function deleteTest($id){
        $sql = "DELETE FROM test WHERE id= ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    }


}