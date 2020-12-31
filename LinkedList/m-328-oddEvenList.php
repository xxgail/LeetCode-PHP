<?php
require 'ListNode.php';

function oddEvenList($head) {
    if ($head == null || $head->next == null) {
        return $head;
    }
    $oddCurrent = $odd = $head;
    $evenCurrent = $even = $head->next;
    while ($evenCurrent != null && $evenCurrent->next != null) {
        $oddCurrent->next = $oddCurrent->next->next;
        $evenCurrent->next = $evenCurrent->next->next;
        $oddCurrent = $oddCurrent->next;
        $evenCurrent = $evenCurrent->next;
    }
    $oddCurrent->next = $even;
    return $odd;
}

$head = new ListNode(1);
$head->next = new ListNode(2);
$head->next->next = new ListNode(3);
$head->next->next->next = new ListNode(4);
$head->next->next->next->next = new ListNode(5);
var_dump(oddEvenList($head));