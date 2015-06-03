<?php
class Formtoken
{
    const FIELDNAME = 'tok';
    const DO_NOT_CLEAR = FALSE;
    public static function getField()
    {
        $token = self::_generateToken();
        return "<input name='" . self::FIELDNAME . "' value='{$token}' type='hidden' />";
    }
    public static function validateToken($request, $clear = true)
    {
        session_start();
        $valid = false;
        $posted = isset($request[self::FIELDNAME]) ? $request[self::FIELDNAME] : '';
        if (!empty($posted)) {
            if (isset($_SESSION['formtoken'][$posted])) {
                 if ($_SESSION['formtoken'][$posted] >= time() - 7200) {
                        $valid = true;
                 }
                 if ($clear) unset($_SESSION['formtoken'][$posted]);
            }
        }
        return $valid;
    }
    protected static function _generateToken()
    {
        session_start();
        $time = time();
        $token = sha1(mt_rand(0, 1000000));
        $_SESSION['formtoken'][$token] = $time;
        return $token;
    }
}
?>
