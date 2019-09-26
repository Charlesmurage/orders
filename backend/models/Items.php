<?php
namespace backend\models;
use Yii;
/**
 * This is the model class for table "items".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_on
 */
class Items extends \yii\db\ActiveRecord
{
    public $uploadedImage;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_on'], 'safe'],
            [['name', 'imageFile'], 'string', 'max' => 255],
            [['description'], 'string'],
            [['uploadedImage'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_on' => 'Updated On',
            'description' => 'Description',
            'imageFile' => 'Picture',
        ];
    }
    /**
     * {@inheritdoc}
     * @return ItemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ItemsQuery(get_called_class());
    }

    public function upload()
    {
        $security = new \yii\base\Security();
        $name = $security->generateRandomString(16);
        $path = 'uploads/' . $name . '.' . $this->uploadedImage->extension;

        if ($this->uploadedImage->saveAs($path)) {
            $this->imageFile = $path;
            return true;
        } else {
            return false;
        }
    }
}
