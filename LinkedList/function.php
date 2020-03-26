<?php
include "ListNode.php";
/**
 * LinkedList
 * ————————————————————————————————
 * @param $arr
 * @return ListNode
 */



//$head = new ListNode(1);
//$head->next = new ListNode(2);
//$head->next->next = new ListNode(3);
//$val = 1;
//$data = removeElements($head,$val);
//print_r($data);


function arrToLinkedNote($arr){
    $head = new ListNode($arr[0]);
    $current = new ListNode($arr[1]);
    $head->next = $current;
    for ($i = 2; $i < count($arr); $i++){
        $current->next = new ListNode($arr[$i]);
        $current = $current->next;
    }
    return $head;
}


var_dump(arrToLinkedNote([1,2,3,4,5]));
