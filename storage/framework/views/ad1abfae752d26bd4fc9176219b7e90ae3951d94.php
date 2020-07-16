
<?php
    $results = data_get($entry, $column['name']);
?>

<span>
    <?php
        if ($results && $results->count()) {
            $results_array = $results->pluck($column['attribute']);
            echo implode(', ', $results_array->toArray());
        } else {
            echo '-';
        }
    ?>
</span><?php /**PATH /home/dredas/lp/web/lp/vendor/backpack/crud/src/resources/views/crud/columns/select_multiple.blade.php ENDPATH**/ ?>