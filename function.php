function MD5_DIR($dir)
{
    if (!is_dir($dir))
    {
        return false;
    }
    
    $filemd5s = array();
    $d = dir($dir);

    while (false !== ($entry = $d->read()))
    {
        if ($entry != '.' && $entry != '..')
        {
             if (is_dir($dir.'/'.$entry))
             {
                 $filemd5s[] = MD5_DIR($dir.'/'.$entry);
             }
             else
             {
                 $filemd5s[] = md5_file($dir.'/'.$entry);
             }
         }
    }
    $d->close();
    return md5(implode('', $filemd5s));
} 
