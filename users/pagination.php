<?php
// total records (example)
$total_records = 120;

// records per page
$limit = 10;

// total pages
$total_pages = ceil($total_records / $limit);

// current page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
if ($page > $total_pages) $page = $total_pages;

// -------------------- Pagination Logic --------------------
$pages_per_set = 5; // show 5 pages in middle

$start_page = max(2, $page - floor($pages_per_set / 2));  
$end_page   = min($total_pages - 1, $start_page + $pages_per_set - 1);

// adjust if near start
if ($end_page - $start_page < $pages_per_set - 1) {
    $start_page = max(2, $end_page - $pages_per_set + 1);
}

// -------------------- Pagination Display --------------------
echo "<div class='pagination'>";

// Always show first page
if ($page == 1) {
    echo "<strong>1</strong> ";
} else {
    echo "<a href='?page=1'>1</a> ";
}

// Dots if needed before middle pages
if ($start_page > 2) {
    echo "... ";
}

// Middle pages
for ($i = $start_page; $i <= $end_page; $i++) {
    if ($i == $page) {
        echo "<strong>$i</strong> ";
    } else {
        echo "<a href='?page=$i'>$i</a> ";
    }
}

// Dots if needed after middle pages
if ($end_page < $total_pages - 1) {
    echo "... ";
}

// Always show last page
if ($total_pages > 1) {
    if ($page == $total_pages) {
        echo "<strong>$total_pages</strong>";
    } else {
        echo "<a href='?page=$total_pages'>$total_pages</a>";
    }
}

echo "</div>";
?>