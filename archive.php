<!-- if this file is not found then bydefault index.php opens -->
<!-- this file will execute when you open archive items such as author,admin,tags, categories,date,time,year,month etc -->
<!--wordpress automatically checks for this file as per priority category-xyz.php>category-00.php>category.php>archive.php>index.php -->

<h1>this is archive.php page</h1>

<?php
if(is_author())
{
echo "author archived";

}
elseif(is_category())
{
echo "category archived"

// it will echo category automaticallly
single_cat_title();

}
elseif(is_day())
{
echo "day archived";
}
elseif(is_month())
{
echo "month archived";
}
elseif(is_year())
{
echo "year archived";
}
?>