# Veterinary Clinic
 

#### Step

1. Download file from github https://github.com/jmsenosa/veterinary-clinic/archive/master.zip
2. Directory (after download has been extracted)
    <br>veterinary-clinic-master<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; veterinary-clinic-master ``ito yung ico-copy nyo kasama lahat ng laman sa baba`` <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; application<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  config<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  controller<br>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  view<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  model<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  libraries<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  third-parties<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  etchetera (mahaba kasi pero gets nyo naman)<br>
3. Copy veterinary-clinic-master to:  <br>
    ```
        xamp => htdocs/
 	```
	<br>
	```
        wamp => www/
    ```
4. In `application/config/config.php` change:<br>
    ```
    $config['base_url']	= 'http://localhost/veterinary-clinic/';
    ```<br>
    To<br>
    ```
    $config['base_url']	= 'http://localhost/veterinary-clinic/';
    ```<br>
5. In `application/config/config.php` change:<br>
    ```
    $config['index_page'] = ''; 
    ```<br>
    To<br>
    ```
    $config['index_page'] = 'index.php';<br>
    ``` 
6. Look for ``.htaccess`` from root directory (www/vaterinary-clinic-master/) and rename it to ``my.htaccess``<br>
7. Change DB details in ``application/config/config.php`` to db details based on your db setup<br>
8. Email Details: ``` send ko na lang sa facebook  :D ```<br>

