<?php
	namespace App\Tools;
	use Cache;
	class Tools{
		   // 微信测试
	// 获取access_token授权
    public function get_access_token(){
      $key='wechat_access_token';
      if (Cache::has($key)) {
        // 取缓存
        $wechat_access_token=Cache::get($key);
        // dd($wechat_access_token);
      }else{
        // 取不到 调接口 取缓存
        $re=file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx671adb2c9975f17c&secret=d260f4c81e9bb58f9579716ec6bdfa7b');
        // dd($re);
        $resurl=json_decode($re,1);
        // dd($resurl);
        Cache::put($key,$resurl['access_token'],$resurl['expires_in']);
        $wechat_access_token=$resurl['access_token'];
      }

      return $wechat_access_token;
    }

    // 素材管理
    public function wechat_curl_file($url,$data){
         $curl = curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }



      // get请求
    public function curl_get($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }





    // post请求
     public function curl_post($url,$data)
    {
        $curl = curl_init($url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }

    // 公众号标签
    public function tagList(){
         $url = 'https://api.weixin.qq.com/cgi-bin/tags/get?access_token='.$this->get_access_token();
        $re = $this->curl_get($url);
        // dd($re);
        $result = json_decode($re,1);
        return $result;
    }

    /**
     * 根据openid获取用户的基本新
     * @param $openid
     * @return mixed
     */
    public function get_wechat_user($openid)
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$this->get_access_token().'&openid='.$openid.'&lang=zh_CN';
        $re = file_get_contents($url);
        $result = json_decode($re,1);
        return $result;
    }
}

 ?>