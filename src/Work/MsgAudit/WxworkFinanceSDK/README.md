####企业微信会话内容存档使用方法（PHP扩展版）

    支持PHP7.0以上版本
    
一：目录结构

        php7-wxwork-finance-sdk：PHP扩展
            c_sdk：企业微信提供的C版本扩展
            
二：安装方法

        注意：{PATH}替换为目录所在的绝对路径
        1：phpize
        2：./configure --with-php-config=php-config --with-wxwork-finance-sdk={PATH}/WxworkFinanceSdk/php7-wxwork-finance-sdk/c_sdk
        3：make && make install
        4：php.ini 增加 extension=wxwork_finance_sdk.so
        5：重启PHP php -m 或 phpinfo() 查看wxwork_finance_sdk.so扩展是否加载成功
       
三：使用方式
           
           具体使用方式及方法定义实现查看编译后的wxwork_finance_sdk.c文件

            try {
                $obj = new WxworkFinanceSdk("coprID", "secret", [
                    "proxy_password" => "world",
                    "timeout"        => -2,
                ]);
        
                // 私钥地址
                $privateKey = file_get_contents('private_key.pem');
        
                // limit:1000,frequency:600/m
                $chats = json_decode($obj->getChatData(0, 1000), true);
        
                foreach ($chats['chatdata'] as $val) {
                    $decryptRandKey = null;
                    openssl_private_decrypt(base64_decode($val['encrypt_random_key']), $decryptRandKey, $privateKey, OPENSSL_PKCS1_PADDING);
        
                    // 解密消息
                    $res = $obj->decryptData($decryptRandKey, $val['encrypt_chat_msg']);
        
                    // 下载文件
                    // $obj->downloadMedia($sdkFileId, "/tmp/download/文件新名称.后缀");
                }
            } catch (\WxworkFinanceSdkException $e) {
                var_dump($e->getMessage(), $e->getCode());
            } 
        
四：错误排查

        Error loading shared library ld-linux-x86-64.so.2
        解决方法：
            ld-linux.so是专门负责寻找库文件的库
            需要动态链接libc库（在Linux里是glibc），由于Apline的Linux版本没有libc库，使用musl：musl是一个轻量级的libc库。Apline的Linux版本里自带musl库
            查看系统的LIBRARY_PATH路径
            在对应的LIBRARY_PATH中做ld-linux-x86-64.so.2的软链即可
            ln -s /lib/libc.musl-x86_64.so.1 /usr/local/lib/ld-linux-x86-64.so.2
            
        
        
        
            