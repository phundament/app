## Upload

Go to Media -> Upload and add files by drag & drop or by clicking the select button below.

> Note: If you upload large images -> Server will resize them according to the presets from `config/main.php`

By default there are defined `large` (1400px), `medium` (500px), `small` (300px) and `icon` (32x32px).

    'medium' => array(
        'name' => 'Medium 500px',
        'commands' => array(
            'resize' => array(600, 600, 2), // Image::AUTO
            'quality' => '85',
        ),
        'type' => 'jpg',
    ),

## Media Browser

Go to Media -> Browse to get an overview of all images available

To structure your media library you are able to create folders (-> Create Folder). To add files to folders click the second line over the image and select the tree parent. To change the title use the first line or click the edit icon to change meta data like title and description.

### Replace media files

*tbd*