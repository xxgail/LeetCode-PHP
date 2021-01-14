<?php
function sortItems($n,$m,$group, $beforeItems) {
    $groupItems = array_fill(0,$n+$m,[]);
    foreach ($group as $k => $item) {
        $group[$k] = $item == -1 ? $m+$k : $item;
        $groupItems[$group[$k]][] = $k;
    }
    $groupGraph = array_fill(0,$m+$n,[]);
    $groupDegree = array_fill(0,$m+$n,0);
    $itemGraph = array_fill(0,$n,[]);
    $itemDegree = array_fill(0,$n,0);
    foreach ($beforeItems as $k => $beforeItem) {
        $curGroupId = $group[$k];
        if ($beforeItem) {
            foreach ($beforeItem as $item) {
                $preGroupId = $group[$item];
                if ($preGroupId != $curGroupId) {
                    $groupGraph[$preGroupId][] = $curGroupId;
                    $groupDegree[$curGroupId]++;
                }else {
                    $itemGraph[$item][] = $k;
                    $itemDegree[$k]++;
                }
            }
        }
    }
    $items = range(0,$m+$n-1);
    $groupOrders = topSort($groupGraph, $groupDegree, $items);
    if (count($groupOrders) < $m+$n) {
        return [];
    }
    $res = [];
    foreach ($groupOrders as $groupId) {
        $items = $groupItems[$groupId];
        if ($items) {
            $orders = topSort($itemGraph, $itemDegree, $items);
            if (count($orders) < count($items)) {
                return [];
            }
            $res = array_merge($res, $orders);
        }
    }
    return $res;
}

function topSort($graph, $deg, $items) {
    $orders = [];
    $q = [];
    foreach ($items as $item) {
        if ($deg[$item] == 0) {
            $q[] = $item;
        }
    }
    while ($q) {
        $from = array_shift($q);
        $orders[] = $from;
        foreach ($graph[$from] as $to) {
            $deg[$to]--;
            if ($deg[$to] == 0) {
                $q[] = $to;
            }
        }
    }
    return $orders;
}

$n = 8;
$m = 2;
$group = [-1,-1,1,0,0,1,0,-1];
$beforeItems = [[],[6],[5],[6],[3,6],[],[],[]];
print_r(sortItems($n,$m,$group,$beforeItems));