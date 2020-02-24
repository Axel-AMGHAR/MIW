<?php

/**
 * PrestaShop module created by VEKIA, a guy from official PrestaShop community ;-)
 *
 * @author    VEKIA https://www.prestashop.com/forums/user/132608-vekia/
 * @copyright 2010-9999 VEKIA
 * @license   This program is not free software and you can't resell and redistribute it
 *
 * CONTACT WITH DEVELOPER http://mypresta.eu
 * support@mypresta.eu
 */
class facebookcomments extends Module
{
    function __construct()
    {
        $this->name = 'facebookcomments';
        $this->tab = 'social_networks';
        $this->version = '1.7.4';
        $this->author = 'mypresta.eu';
        $this->bootstrap = true;
        $this->mypresta_link = 'https://mypresta.eu/modules/social-networks/facebook-comments.html';
        $this->dir = '/modules/facebookcomments/';
        parent::__construct();
        $this->displayName = $this->l('Facebook Comments');
        $this->description = $this->l('An easiest way to add facebook comments plugin for your prestashop store');
        $this->mkey = "freelicense";
        $this->checkforupdates();
    }

    public function checkforupdates($display_msg = 0, $form = 0)
    {
        // ---------- //
        // ---------- //
        // VERSION 16 //
        // ---------- //
        // ---------- //
        $this->mkey = "nlc";
        if (@file_exists('../modules/' . $this->name . '/key.php')) {
            @require_once('../modules/' . $this->name . '/key.php');
        } else {
            if (@file_exists(dirname(__FILE__) . $this->name . '/key.php')) {
                @require_once(dirname(__FILE__) . $this->name . '/key.php');
            } else {
                if (@file_exists('modules/' . $this->name . '/key.php')) {
                    @require_once('modules/' . $this->name . '/key.php');
                }
            }
        }
        if ($form == 1) {
            return '
            <div class="panel" id="fieldset_myprestaupdates" style="margin-top:20px;">
            ' . ($this->psversion() == 6 || $this->psversion() == 7 ? '<div class="panel-heading"><i class="icon-wrench"></i> ' . $this->l('MyPresta updates') . '</div>' : '') . '
			<div class="form-wrapper" style="padding:0px!important;">
            <div id="module_block_settings">
                    <fieldset id="fieldset_module_block_settings">
                         ' . ($this->psversion() == 5 ? '<legend style="">' . $this->l('MyPresta updates') . '</legend>' : '') . '
                        <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
                            <label>' . $this->l('Check updates') . '</label>
                            <div class="margin-form">' . (Tools::isSubmit('submit_settings_updates_now') ? ($this->inconsistency(0) ? '' : '') . $this->checkforupdates(1) : '') . '
                                <button style="margin: 0px; top: -3px; position: relative;" type="submit" name="submit_settings_updates_now" class="button btn btn-default" />
                                <i class="process-icon-update"></i>
                                ' . $this->l('Check now') . '
                                </button>
                            </div>
                            <label>' . $this->l('Updates notifications') . '</label>
                            <div class="margin-form">
                                <select name="mypresta_updates">
                                    <option value="-">' . $this->l('-- select --') . '</option>
                                    <option value="1" ' . ((int)(Configuration::get('mypresta_updates') == 1) ? 'selected="selected"' : '') . '>' . $this->l('Enable') . '</option>
                                    <option value="0" ' . ((int)(Configuration::get('mypresta_updates') == 0) ? 'selected="selected"' : '') . '>' . $this->l('Disable') . '</option>
                                </select>
                                <p class="clear">' . $this->l('Turn this option on if you want to check MyPresta.eu for module updates automatically. This option will display notification about new versions of this addon.') . '</p>
                            </div>
                            <label>' . $this->l('Module page') . '</label>
                            <div class="margin-form">
                                <a style="font-size:14px;" href="' . $this->mypresta_link . '" target="_blank">' . $this->displayName . '</a>
                                <p class="clear">' . $this->l('This is direct link to official addon page, where you can read about changes in the module (changelog)') . '</p>
                            </div>
                            <div class="panel-footer">
                                <button type="submit" name="submit_settings_updates"class="button btn btn-default pull-right" />
                                <i class="process-icon-save"></i>
                                ' . $this->l('Save') . '
                                </button>
                            </div>
                        </form>
                    </fieldset>
                    <style>
                    #fieldset_myprestaupdates {
                        display:block;clear:both;
                        float:inherit!important;
                    }
                    </style>
                </div>
            </div>
            </div>';
        } else {
            if (defined('_PS_ADMIN_DIR_')) {
                if (Tools::isSubmit('submit_settings_updates')) {
                    Configuration::updateValue('mypresta_updates', Tools::getValue('mypresta_updates'));
                }
                if (Configuration::get('mypresta_updates') != 0 || (bool)Configuration::get('mypresta_updates') != false) {
                    if (Configuration::get('update_' . $this->name) < (date("U") - 259200)) {
                        $actual_version = facebookcommentsUpdate::verify($this->name, (isset($this->mkey) ? $this->mkey : 'nokey'), $this->version);
                    }
                    if (facebookcommentsUpdate::version($this->version) < facebookcommentsUpdate::version(Configuration::get('updatev_' . $this->name)) && Tools::getValue('ajax','false') == 'false') {
                        $this->context->controller->warnings[] = '<strong>' . $this->displayName . '</strong>: ' . $this->l('New version available, check http://MyPresta.eu for more informations') . ' <a href="' . $this->mypresta_link . '">' . $this->l('More details in changelog') . '</a>';
                        $this->warning                         = $this->context->controller->warnings[0];
                    }
                } else {
                    if (Configuration::get('update_' . $this->name) < (date("U") - 259200)) {
                        $actual_version = facebookcommentsUpdate::verify($this->name, (isset($this->mkey) ? $this->mkey : 'nokey'), $this->version);
                    }
                }
                if ($display_msg == 1) {
                    if (facebookcommentsUpdate::version($this->version) < facebookcommentsUpdate::version(facebookcommentsUpdate::verify($this->name, (isset($this->mkey) ? $this->mkey : 'nokey'), $this->version))) {
                        return "<span style='color:red; font-weight:bold; font-size:16px; margin-right:10px;'>" . $this->l('New version available!') . "</span>";
                    } else {
                        return "<span style='color:green; font-weight:bold; font-size:16px; margin-right:10px;'>" . $this->l('Module is up to date!') . "</span>";
                    }
                }
            }
        }
    }

    public function install()
    {
        if (parent::install() == false or
            !Configuration::updateValue('update_' . $this->name, '0') OR
            !$this->registerHook('displayProductExtraContent') OR
            !$this->registerHook('header') OR
            !$this->registerHook('displayFooterProduct') OR
            !$this->registerHook('displayRightColumn') OR
            !$this->registerHook('displayLeftColumn') OR
            !Configuration::updateValue('fcbc_where', '1'))
        {
            return false;
        }
        return true;
    }

    public function installconfiguration()
    {

        $fcbc_langarray = "";
        foreach (Language::getLanguages(false) AS $key => $value)
        {
            $fcbc_langarray[$key] = 'en_GB';
        }
        return $fcbc_langarray;
    }

    public function getconf()
    {
        $array['fcbc_where'] = Configuration::get('fcbc_where');
        $array['fcbc_url'] = Configuration::get('fcbc_url');
        $array['fcbc_width'] = Configuration::get('fcbc_width');
        $array['fcbc_nbp'] = Configuration::get('fcbc_nbp');
        $array['fcbc_scheme'] = Configuration::get('fcbc_scheme');
        $array['fcbc_lang'] = Configuration::get('fcbc_langarray', $this->context->language->id);
        $array['fcbc_admins'] = Configuration::get('fcbc_admins');
        $array['fcbc_appid'] = Configuration::get('fcbc_appid');
        $array['product_page_url'] = trim(strtok($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], '?'));
        return $array;
    }

    public function psversion()
    {
        $version = _PS_VERSION_;
        $exp = $explode = explode(".", $version);
        return $exp[1];
    }

    public function advert()
    {
        return '<div class="panel">
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = \'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=1001062503258191&autoLogAppEvents=1\';
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, \'script\', \'facebook-jssdk\'));</script>
                <h3>
                <i class="icon-wrench"></i> ' . $this->l('I am developing this module for free - if you want') . ' <a class="btn button label label-danger" target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7WE8PTH4ZPYZA">' . $this->l('send me a donation') . '</span></a>
                <div class="pull-right" style="top: 5px; position: relative; background: #f98080; padding: 10px; border-radius: 5px; box-shadow: 0px 0px 15px #FFF;"><div class="fb-like" data-href="https://facebook.com/mypresta" data-layout="box_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div></div>
                </h3>
                <iframe src="//apps.facepages.eu/somestuff/whatsgoingon.html" width="100%" height="150" border="0" style="border:none;"></iframe>
            </div>';
    }

    public function getContent()
    {
        $output = "";
        if (Tools::isSubmit('submitDisplayForm'))
        {
            $languages = array();
            foreach (Language::getIDs(false) as $id_lang)
            {
                $languages[$id_lang] = Tools::getValue('fcbc_langarray_'.$id_lang);
            }

            Configuration::updateValue('fcbc_where', Tools::getValue('fcbc_where'));
            Configuration::updateValue('fcbc_width', Tools::getValue('fcbc_width'));
            Configuration::updateValue('fcbc_nbp', Tools::getValue('fcbc_nbp'));
            Configuration::updateValue('fcbc_scheme', Tools::getValue('fcbc_scheme'));
            Configuration::updateValue('fcbc_langarray', $languages);
            Configuration::updateValue('fcbc_admins', Tools::getValue('fcbc_admins'));
            Configuration::updateValue('fcbc_appid', Tools::getValue('fcbc_appid'));
            Configuration::updateValue('fcbc_addappid', Tools::getValue('fcbc_addappid'));
            $this->context->controller->confirmations[]=$this->l('Settings Saved');
        }
        return $output . $this->displayForm();
    }

    public function getConfigFieldsValues()
    {
        $languages = array();
        foreach (Language::getIDs(false) as $id_lang)
        {
            $languages[$id_lang] = Configuration::get('fcbc_langarray', $id_lang);
        }
        return array(
            'fcbc_where' => Configuration::get('fcbc_where'),
            'fcbc_width' => Configuration::get('fcbc_width'),
            'fcbc_nbp' => Configuration::get('fcbc_nbp'),
            'fcbc_scheme' => Configuration::get('fcbc_scheme'),
            'fcbc_admins' => Configuration::get('fcbc_admins'),
            'fcbc_addappid' => Configuration::get('fcbc_addappid'),
            'fcbc_appid' => Configuration::get('fcbc_appid'),
            'fcbc_langarray' => $languages,
        );
    }

    public function displayForm()
    {
        $skin = array();
        $skin[] = array('id_option' => 'light', 'name' => $this->l('Light'));
        $skin[] = array('id_option' => 'dark', 'name' => $this->l('Dark'));

        $positions = array();
        $positions[] = array('id_option' => 1, 'name' => $this->l('Product Tabs'));
        $positions[] = array('id_option' => 2, 'name' => $this->l('Product Footer'));
        $positions[] = array('id_option' => 3, 'name' => $this->l('Right Column'));
        $positions[] = array('id_option' => 4, 'name' => $this->l('Left Column'));

        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Facebook Comments widget'),
                    'icon' => 'icon-cogs'
                ),
                'description' => $this->l('Settings of "facebook comments" module by MyPresta.eu'),
                'input' => array(
                    array(
                        'type' => 'select',
                        'label' => $this->l('Where you want to display widget?'),
                        'name' => 'fcbc_where',
                        'desc' => $this->l('Select position of the comments widget, module will show it inside this hook'),
                        'options' => array(
                            'query' => $positions,
                            'id' => 'id_option',
                            'name' => 'name'
                        ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Width'),
                        'name' => 'fcbc_width',
                        'prefix' => 'px',
                        'desc' => $this->l('Set the width of the facebook comments widget, put here number up to 550.'),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Number of comments'),
                        'name' => 'fcbc_nbp',
                        'desc' => $this->l('The number of comments to show by default. The minimum value is 1, maximum value is 10'),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('Color scheme'),
                        'name' => 'fcbc_scheme',
                        'desc' => $this->l('Set the colors of the facebook comments widget'),
                        'options' => array(
                            'query' => $skin,
                            'id' => 'id_option',
                            'name' => 'name'
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Include APP'),
                        'name' => 'fcbc_addappid',
                        'desc' => $this->l('Facebook Application all.js is a special script required for facebook widgets. If your shop already have it - you do not have to add it one more time - it is for better performance purposes'),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('On')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Off')
                            )
                        ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('App language codes'),
                        'name' => 'fcbc_langarray',
                        'desc' => $this->l('If you turned on option to include facebook app you must define language codes for each language in your shop. Do not leave this field empty.') . ' ' . '<a href="https://mypresta.eu/en/art/know-how/facebook-list-of-local-language-codes.html" target="blank">' . $this->l('read more about language codes') . '</a>',
                        'lang' => true,
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('APP ID'),
                        'name' => 'fcbc_appid',
                        'desc' => '<a href="https://mypresta.eu/en/art/basic-tutorials/how-to-create-facebook-application-id.html" target="_blank">' . $this->l('read how to create own app id') . '</a>',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Admins'),
                        'name' => 'fcbc_admins',
                        'desc' => $this->l('Grant moderation privileges for selected facebook accounts. Separate all admin IDs by commas (ID of facebook private profile)'),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save settings'),
                ),
            )
        );

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $this->fields_form = array();
        $helper->identifier = 'displayFormIdentifier';
        $helper->submit_action = 'submitDisplayForm';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false) . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );
        return $this->advert() . $helper->generateForm(array($fields_form)) . $this->checkforupdates(0, 1);
    }

    public function hookheader($params)
    {
        $var = $this->getconf();
        $this->context->controller->addCSS(($this->_path) . 'facebookcomments.css', 'all');
        $this->context->smarty->assign('var', $var);
        return $this->display(__FILE__, 'header.tpl');
    }

    public function hookdisplayFooterProduct($params)
    {
        if (isset($_GET['id_product']) && isset($_GET['controller']))
        {
            if ($_GET['controller'] == 'product')
            {
                $var = $this->getconf();
                $this->context->smarty->assign('var', $var);
                if ($var['fcbc_where'] == 2)
                {
                    return $this->display(__FILE__, 'productfooter.tpl');
                }
            }
        }
    }

    public function hookdisplayProductExtraContent($params)
    {
        $var = $this->getconf();
        $this->context->smarty->assign('var', $var);

        if ($var['fcbc_where'] == 1)
        {
            $ps17tabz[] = (new PrestaShop\PrestaShop\Core\Product\ProductExtraContent())->setTitle($this->l('Comments'))->setContent($this->context->smarty->fetch('module:facebookcomments/tabcontents.tpl'));
            return $ps17tabz;
        }
        return array();
    }

    public function hookdisplayRightColumn($params)
    {
        $var = $this->getconf();
        if ($var['fcbc_where'] == 3)
        {
            if (isset($_GET['id_product']) && isset($_GET['controller']))
            {
                if ($_GET['controller'] == 'product')
                {
                    $this->context->assign('var', $var);
                    return $this->display(__FILE__, 'productfooter.tpl');
                }
            }
        }
    }

    public function hookdisplayLeftColumn($params)
    {
        $var = $this->getconf();
        if ($var['fcbc_where'] == 4)
        {
            if (isset($_GET['id_product']) && isset($_GET['controller']))
            {
                if ($_GET['controller'] == 'product')
                {
                    $this->context->smarty->assign('var', $var);
                    return $this->display(__FILE__, 'productfooter.tpl');
                }
            }
        }
    }

    public function inconsistency($ret)
    {
        return;
    }

}

class facebookcommentsUpdate extends facebookcomments
{

    public static function version($version)
    {

        $version = (int)str_replace(".", "", $version);
        if (strlen($version) == 3)
        {
            $version = (int)$version . "0";
        }
        if (strlen($version) == 2)
        {
            $version = (int)$version . "00";
        }
        if (strlen($version) == 1)
        {
            $version = (int)$version . "000";
        }
        if (strlen($version) == 0)
        {
            $version = (int)$version . "0000";
        }
        return (int)$version;
    }

    public static function encrypt($string)
    {

        return base64_encode($string);
    }

    public static function verify($module, $key, $version)
    {

        if (ini_get("allow_url_fopen"))
        {
            if (function_exists("file_get_contents"))
            {
                $actual_version = @file_get_contents('http://dev.mypresta.eu/update/get.php?module=' . $module . "&version=" . self::encrypt($version) . "&lic=$key&u=" . self::encrypt(_PS_BASE_URL_ . __PS_BASE_URI__));
            }
        }
        Configuration::updateValue("update_" . $module, date("U"));
        Configuration::updateValue("updatev_" . $module, $actual_version);
        return $actual_version;
    }
}

?>