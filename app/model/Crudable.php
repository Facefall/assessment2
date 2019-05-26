<?php


interface Crudable {
    function deleteRecord($id);
    function insertRecord($values);
    function readRecords();
    function readRecord($id);
    function searchRecords($keyword);
    function updateRecord($id);
}
