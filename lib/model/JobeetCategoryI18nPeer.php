<?php

class JobeetCategoryI18nPeer extends BaseJobeetCategoryI18nPeer
{
   static public function getForSlug($slug)
   {
      $criteria = new Criteria();
      $criteria->addJoin(JobeetCategoryI18nPeer::ID, self::ID);
      $criteria->add(JobeetCategoryI18nPeer::CULTURE, 'en');
      $criteria->add(JobeetCategoryI18nPeer::SLUG, $slug);

      return self::doSelectOne($criteria);
   }

}
