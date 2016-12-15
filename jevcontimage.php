<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');
JLoader::register('JevJoomlaVersion', JPATH_ADMINISTRATOR . '/components/com_jevents/libraries/version.php');

class plgJEventsjevcontimage extends JPlugin {

    var
            $_dbvalid = 0;
    private
            $anonupload = false;

    function __construct(& $subject, $config) {
        parent::__construct($subject, $config);

        JFactory::getLanguage()->load('plg_jevents_jevfiles', JPATH_ADMINISTRATOR);

        jimport('joomla.application.component.view');

        if (version_compare(JVERSION, '1.6.0', 'ge')) {
            $this->_basepath = JPATH_SITE . '/plugins/jevents/jevfiles/';
        } else {
            $this->_basepath = JPATH_SITE . '/plugins/jevents/';
        }
    }


    static
             function fieldNameArray($layout = 'detail') {
                 $return = array();
                 $return['group'] = JText::_("JEV_CONTIMAGE", true);
                 
                 $labels = array();
                 $values = array();
                 
                 JPluginHelper::importPlugin('jevents');
                 $plugin = JPluginHelper::getPlugin("jevents", "jevcontimage");
                 $params = new JRegistry($plugin->params);
                 
                 if ($layout == "list") {
                     $labels[] = JText::_("JEV_CONTIMAGE", true);
                     $values[] = "JEV_CONTIMAGE";
                 }
                 $return['values'] = $values;
                 $return['labels'] = $labels;
                 
                 return $return;
             }

    static function substitutefield($row, $code) {
        $plugin = JPluginHelper::getPlugin("jevents", "jevcontimage");
        $params = new JRegistry($plugin->params);
        if (strpos($code, "JEV_CONTIMAGE") === 0) {
            // print_r($row->content);
            $image = preg_match('/<img.*?src=[\"\'](.*?)[\"\'].*?\/>/', $row->content, $matches);
            if ($image === 1) {
            $src = $matches[1];
            // Separate search for alt since it can be given before or after src
            $altm = preg_match('/alt=[\"\'](.*?)[\"\']/', $matches[0], $altmatches);
            $alt = ($altm === 1 ? $alt = $altmatches[1] : '') ;
            // echo "src = $src ";
            // echo "alt = $alt ";
            $image = '<img src="'. $src. '" alt="'. $alt . '" class="jev_imagethumb" />';
            $preparedimage = JHtml::_('content.prepare', $image);
            $i = str_replace("JEV_CONTIMAGE", $preparedimage, $code);
            return $i;
        }
        }
            return "";
        }
}
