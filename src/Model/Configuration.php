<?php
namespace SnowSolution\AnyConfig\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \SnowSolution\AnyConfig\Traits\Bootstrap;

class Configuration extends Model {
    protected $table = 'any_configuration';
    protected $primaryKey = 'id';
    protected $fillable = [
        'scope','scope_id', 'path', 'value'
    ];
    public $timestamps = false;
    use HasFactory;
    use Bootstrap;
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function getValue($path, $defaultValue = null) {
        $getConfigurationQuery = self::all()
            ->where('path', $path);

        $configObject = $getConfigurationQuery->first();
        if (!is_null($configObject)) {
            $value = $configObject->value;
        } else {
            if (is_null($defaultValue)) {
                $defaultValue = $this->getBaseDefaultValue($path);
            }
            $value = $defaultValue;
        }
        return $value;
    }

    public function getBaseDefaultValue($path) {
        $defaultValue= null;
        $pathArgs = '';
        $allConfiguration = Bootstrap::$allConfiguration;
        try {
            $pathArgs = explode('/', $path);
            $tabId = $pathArgs[0];
            $sectionId = $pathArgs[1];
            $groupId = $pathArgs[2];
            $fieldId = $pathArgs[3];
            $fieldConfigMap = $allConfiguration['tabs'][$tabId]['sections'][$sectionId]['groups'][$groupId]['fields'][$fieldId];
            if (array_key_exists('default_value', $fieldConfigMap)) {
                $defaultValue = $fieldConfigMap['default_value'];
            }
            return $defaultValue;
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function renderConfigurationField($field) {
        $type = $field['type'];
        $view = view('anyconfig::configurations.field_type.' . $type)
            ->with('field', $field)
            ->with('configValue', $this->getValue($field['path']));
        return $view->render();
    }
}