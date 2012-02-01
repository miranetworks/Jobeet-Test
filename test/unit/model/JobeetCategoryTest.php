<?php
// test/unit/model/JobeetCategoryTest.php
include(dirname(__FILE__).'/../../bootstrap/Propel.php');
 
$t = new lime_test(4, new lime_output_color());
 
$t->comment('->getWithJobs()');
$category = JobeetCategoryPeer::getWithJobs();
$t->ok(!empty($category),"->getWithJobs() retrieves categories");

$t->comment('->countActiveJobs()');
$category = JobeetCategoryPeer::doSelectOne(new Criteria());
$category = $category->countActiveJobs();
$t->ok($category > 0,"->countActiveJobs() count active Jobs: ". $category);

$t->comment('->getActiveJobs()');
$category = JobeetCategoryPeer::doSelectOne(new Criteria());
$category = $category->getActiveJobs();
$t->ok(!empty($category),"->getActiveJobs() returns active Jobs");

$t->comment('->setName()');
$category = JobeetCategoryPeer::doSelectOne(new Criteria());
$category->setName("Test");
$t->is($category->getName() ,"Test" ,"->setName() Checks to see if objects Slug updates");

