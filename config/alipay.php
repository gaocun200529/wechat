<?php
return array (	
		//应用ID,您的APPID。
		'app_id' => "2016101100657158",
		// //商户ID
		// 'seller_id' => "2088102179011817",

		//商户私钥
		'private_key' => "MIIEpQIBAAKCAQEAwSp+SxPcz/5Q0NfoKQxtJL93bgDPIXSw7U+iaeQm1rC4xRlxPzTOYCshd4ntfT1n9GfyOQivd5WDBbvvG4v+W1tp5UXVxCMiPfvtpM45LKeYe/Dz8p0KV1nNnjDIB4NZCuz7qzTJMU4nXLYgFQCzdJe8Xwby738VUQ2AxhOg1fU4Qdzbp4uL7tU1bKuPcTLwgk1hOEzKzCWbRFxWk0g5ZEcZk0qsv8rIkSir8Ag2f9qhYUxgv6MuPeUP/frFPhbGKiqBAWQNC7UBAVv+8jeENaHV9sad+ANAvuUZm4c9b7uA93mvsOV5PlGhLoUj8mFNE8r/1EotLs6ipGt5WPca0wIDAQABAoIBAQCobl4LJvmeXzmmsOydhllQ9qazw37YxEBV3N9Yh/kZsKScMHAf1fKxxkn7SshLMRUI9u4trxYZJsRFZra6hVo33MC8iyU3Tg9YjuiLkMon1sdOIy8DeM2AlyyEaDKy4mPs8/EKOw/Hr0cBP0lAJwlTe89j6NJB5MT4lNaZYJoYlKKAzvEWxoN+4YRIE5RGSv8ZhIThsw2j5D0LVhf5rUWdpAR+cFvq6WUkTjFVJfRdf+ABt6bNuuPTyOx8kVIE3T7/dGLsfcAqMXILBrIOKI0tMNLH6ynx49vWEIfAhXxWyUqWiDGY7+zllcSDuMwnhKFWAnayCt0olHkXPFjY+QBJAoGBAOxOPc0oqF0YSQcE5oGJ8Z0PdoVSM8FWQ2g7LyfGbn9WSGF+asIgpgRA9dRjGraT0Ldu9raddgLOpu3AguO9/0OCd2dhtlwfIFgLD2A7R06OaN+kzbgT1iQFpejLBV9RHyTl8hUiO5bYICP9xR98uuYeWlH4T9FKjrDWrSrj+nzdAoGBANFD1c9BUF09CFtkxfrlX1fz97nIrvraHIXHvlLQiUpCxyxLmLLx8WV42yahpnA0ae/RKJTqUZxQd6YrQRAhTm3jTnjv7DVtyi3z6IJBQBsbXLYcp060qNZhs0gonZXClnVBP/YxEGtlB7I74rJERRCm5ETito9uGbAxgLelf+NvAoGBALJtXbLkqUQqCzI2nAph60MpoteGOzgX96vjTHbfGR4jO2IKP3g3iMObfUOSVWBY+ncXXUiEWtBB07+f5fUqyGzkPV6dZEHo6tYv+7sw52XEmCGOYhtFNyNZ9G1zpqnTKg4FZqZYg+AhbxteCZL97m3Fq3NLaJFil52la3oATGotAoGAI6quLG7zZZDbdchNPiAOCg2Y8V9VA4hdSCftNmw4miGblN8lnYpDHIpmv8TZe1JTo/5ALnFpi3zjh7zjj/49Qdl2LIKn/ctCpGZoAJtic7xMJvXnRjDgffmU9v2FLltGDaIbZriiFcvYbfZrAvtD0jy/t0X026lmU3N8ftCEZZ0CgYEA4ddA+5n4UevAvqZPB7KMvJKYMtaDpPd3xdRSY1jQz31H6qS5WoZIy23IxZ2CcmfgcLyevoMM8z4f2iJuBiApQA9NfAyJz+PdknZjHrCChkEgyuQ22RdEvru2YzibN7r9Xz2KAjWLNX72tinQX/zOlx2H3A/UUaT5iS/iz2OYrng=",
		
		//异步通知地址
		'notify_url' => "http://39.105.102.52//index/Order/notifypag",
		
		//同步跳转
		'return_url' => "http://www.laravel.com/return",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'ali_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEApQusLDulsxygpQv8/0LUjr1qZk5pqfqby5KrKuwDeWB5lcOiU6647ztBBH7/UxFJLUqAjxjdTiDyWWPQEdPy7JFsYQJDlOZ/E8ORozNWSQSHoaNFJL44SBYVxepKhId7pH7kCCl1Pk2aQA1Lfb6Hc/oXJ8UNzpJ4X6cA4d5LDCK5uYm+x0cBSwkgSAt6FsQ2WmfPN7wUqy/eyE+g9yaUP12hvAR0oqL/jTmvs2xUTmahmkOLVt1hq3nSzTHrtX/lKTi/ETyjoHy+xsx+kUPI7uRUAUfOVwzgm4lIMI6OtfKnFQRzgVC11d4i7eVyDaPVUhYHxAOqLhSV3/mLtashTwIDAQAB",


		  'log' => [ // optional
            'file' => storage_path('log/pay.log'),
           
        ],
        'http' => [ // optional
            'timeout' => 5.0,
            'connect_timeout' => 5.0,
        ],
        'mode' => 'dev', // optional,设置此参数，将进入沙箱模式
);