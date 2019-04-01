<?php

namespace ubitcorp\Settings\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait hasSettings
{
    public function settings(): MorphMany
    { 
        return $this->morphMany(
            \ubitcorp\Settings\Entities\Setting::class,
            'model'
        );
    }

    /**
     * Add a setting by keyword and value 
     *  */     
    public function addSetting($keyword, $value)
    {
        $keyword = trim($keyword);
        $value = trim($value);

        try {
            $this->settings()->create([
                "keyword" => $keyword,
                "value" => $value,
            ]);

        } catch (\Illuminate\Database\QueryException $e) {

          $errorCode = $e->errorInfo[1];
          if($errorCode == '1062'){
            $this->settings()->where("keyword",$keyword)->update([
              "value" => $value,
            ]);  
          }

        }
    }

    public function addSettings($settings){
      if(!is_array($settings))
        return;

      foreach($settings as $keyword=>$value){
        $this->addSetting(trim($keyword), trim($value));
      }
    }

    public function removeSetting($keyword){
      $this->settings()->where('keyword', trim($keyword))->delete();

      $this->load('settings');
    }

    public function removeSettings($keywords){
      $keyword = trim($keyword);

      if(!is_array($keywords))
        return $this->removeSetting($keywords);
      
      $this->settings()->whereIn('keyword', $keywords)->delete();


      $this->load('settings');
    }    

    /**
     *  Delete all existing settings for model and add new ones.
     */
    
    public function syncSettings($settings){
      if(!is_array($settings))
        return;

      $this->settings()->delete();
      $this->addSettings($settings);

      $this->load('settings');
    }

    public function valueOfSetting($keyword){
      //loads all settings first and then use same collection every time.
      $result =  $this->settings->firstWhere('keyword', trim($keyword));
      
      if($result)
        return trim($result->value);

      return null;
      
    }

    public function valueOfSettingAsArray($keyword){
      return array_map("trim",explode(",",$this->valueOfSetting($keyword)));
    }    

}
