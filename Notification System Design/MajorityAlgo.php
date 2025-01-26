
<?php
function majorityElement($nums){
    $find = null;
    $count = 0;

    foreach($nums as $num){
        if($count === 0){
            $find = $num;
        }
        if($num === $find){
            $count++;
        }
        else{
            $count--;
        }
    }
    $count = 0;
    foreach($nums as $num){
        if($num === $find){
            $count++;
        }
    }
    if($count > floor(count($nums)/2)){
        return $find;
    }
    else{
        return -1;
    }
}

$nums1 = [3, 2, 3];
$nums2 = [2, 2, 1, 1, 1, 2, 2];

echo "Majority Element in nums1: " . majorityElement($nums1) . "\n"; 
echo "Majority Element in nums2: " . majorityElement($nums2) . "\n"; 
?>