<?php

class JobeetCategory extends BaseJobeetCategory
{
   public function __toString()
   {
      return $this -> getName();
   }

   public function getActiveJobs()
   {
      $criteria = $this -> getActiveJobsCriteria();
      $criteria -> setLimit(sfConfig::get('app_max_jobs_on_homepage'));

      return JobeetJobPeer::getActiveJobs($criteria);
   }

   public function countActiveJobs()
   {
      $criteria = $this -> getActiveJobsCriteria();

      return JobeetJobPeer::doCount($criteria);
   }

   public function getActiveJobsCriteria()
   {
      $criteria = new Criteria();
      $criteria -> add(JobeetJobPeer::CATEGORY_ID, $this -> getId());

      return JobeetJobPeer::addActiveJobsCriteria($criteria);
   }

   public function getLatestPost()
   {
      $jobs = $this -> getActiveJobs(1);

      return $jobs[0];
   }

}
