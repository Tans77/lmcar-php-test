<?php
namespace App\App;

use App\Util\HttpRequest;
class Demo {
    const URL = "http://some-api.com/user_info";
    private $_logger;
    private $_req;
    function __construct($logger, HttpRequest $req) {
        $this->_logger = $logger;
        $this->_req = $req;
    }
    function set_req(HttpRequest $req) {
        $this->_req = $req;
    }
    function foo() {
        return "bar";
    }
    function get_user_info() {
        //$result = $this->_req->get(self::URL);
        $result = json_encode([
            "error" => 0,
            "data" => [
                "id" => 1,
                "username" => "hello world",
            ]
        ]);
        $result_arr = json_decode($result, true);
        if (!empty($result_arr) && in_array('error', $result_arr) && $result_arr['error'] == 0) {
            if (in_array('data', $result_arr)) {
                return $result_arr['data'];
            }
        } else {
            $this->_logger->error("fetch data error.");
        }
        return null;
    }
}
