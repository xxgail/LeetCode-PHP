<?php
include "ListNode.php";
/**
 * LinkedList
 * ————————————————————————————————
 */



$head = new ListNode(1);
$head->next = new ListNode(2);
$head->next->next = new ListNode(3);
$val = 1;
$data = removeElements($head,$val);
print_r($data);
