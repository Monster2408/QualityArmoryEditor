<?php
// Symfony Yamlライブラリの手動インクルード
require_once __DIR__ . '/vendor/symfony/yaml/Yaml.php';
require_once __DIR__ . '/vendor/symfony/yaml/Dumper.php';
require_once __DIR__ . '/vendor/symfony/yaml/Parser.php';
require_once __DIR__ . '/vendor/symfony/yaml/Inline.php';
require_once __DIR__ . '/vendor/symfony/yaml/Escaper.php';
// 他にも必要なファイルがあればインクルード

use Symfony\Component\Yaml\Yaml;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームデータの処理（上記のコードと同様）

    $gunData = [
        'name' => $_POST['name'] ?? '',
        'displayname' => $_POST['display_name'] ?? '',
        'id' => (int)($_POST['id'] ?? 0),
        'variant' => (int)($_POST['variant'] ?? 0),
        'craftingRequirements' => [
            $_POST['craftingRequirementsMaterial'] . ',' . $_POST['craftingRequirementsDurability'] . ',' . $_POST['craftingRequirementsAmount']
        ],
        'weapontype' => $_POST['weaponType'] ?? '',
        'weaponsounds' => $_POST['weaponSounds'] ?? '',
        'enableIronSights' => isset($_POST['enableIronSights']),
        'ammotype' => $_POST['ammoType'] ?? '',
        'damage' => (int)($_POST['damage'] ?? 0),
        'maxbullets' => (int)($_POST['maxBullets'] ?? 0),
        'price' => (int)($_POST['price'] ?? 0),
        'material' => $_POST['material'] ?? '',
        'bullets-per-shot' => (int)($_POST['bulletsPerShot'] ?? 0),
        'maxBulletDistance' => (int)($_POST['maxBulletDistance'] ?? 0),
        'firerate' => (int)($_POST['fireRate'] ?? 0),
        'isAutomatic' => isset($_POST['isAutomatic']),
        'recoil' => (float)($_POST['recoil'] ?? 0),
        'KilledByMessage' => $_POST['KilledByMessage'] ?? '',
        'invalid' => isset($_POST['invalid']),
        'durability' => (int)($_POST['durability'] ?? 0),
        'maxItemStack' => (int)($_POST['maxItemStack'] ?? 0),
        'setZoomLevel' => (int)($_POST['setZoomLevel'] ?? 0),
        'sway' => [
            'defaultValue' => (float)($_POST['swayDefaultValue'] ?? 0),
            'defaultMultiplier' => (float)($_POST['swayDefaultMultiplier'] ?? 0),
            'sneakModifier' => isset($_POST['swaySneakModifier']),
            'moveModifier' => isset($_POST['swayMoveModifier']),
            'runModifier' => isset($_POST['swayRunModifier']),
            'unscopedModifier' => (float)($_POST['swayUnscopedModifier'] ?? 0),
        ],
        'delayForReload' => (float)($_POST['delayForReload'] ?? 0),
        'delayForShoot' => (float)($_POST['delayForShoot'] ?? 0),
        'unlimitedAmmo' => isset($_POST['unlimitedAmmo']),
        'LightLeveOnShoot' => (int)($_POST['LightLevelOnShoot'] ?? 0),
        'slownessOnEquip' => (int)($_POST['slownessOnEquip'] ?? 0),
        'particles' => [
            'bullet_particle' => $_POST['bullet_particle'] ?? '',
            'bullet_particleR' => (float)($_POST['bullet_particleR'] ?? 0),
            'bullet_particleG' => (float)($_POST['bullet_particleG'] ?? 0),
            'bullet_particleB' => (float)($_POST['bullet_particleB'] ?? 0),
            'bullet_particleData' => (float)($_POST['bullet_particleData'] ?? 0),
            'bullet_particleMaterial' => $_POST['bullet_particleMaterial'] ?? '',
        ],
        'Version_18_Support' => isset($_POST['Version_18_Support']),
        'ChargingHandler' => $_POST['ChargingHandler'] ?? 'none',
        'ReloadingHandler' => $_POST['ReloadingHandler'] ?? 'none',
        'addMuzzleSmoke' => isset($_POST['addMuzzleSmoke']),
        'drop-glow-color' => $_POST['dropGlowColor'] ?? 'none',
        'headshotMultiplier' => (float)($_POST['headshotMultiplier'] ?? 0),
        'weaponsounds_volume' => (float)($_POST['weaponsounds_volume'] ?? 0),
        'firing_knockback' => (int)($_POST['firing_knockback'] ?? 0),
        'DestructableMaterials' => explode(',', $_POST['DestructableMaterials'] ?? ''),
        'lastModifiedByQA' => (int)($_POST['lastModifiedByQA'] ?? 0)
    ];

    // YAMLファイルに変換
    $yamlContent = Yaml::dump($gunData, 2, 4);

    // ファイル名と保存先を設定
    $fileName = 'gun_config_' . $gunData['name'] . '.yml';
    $filePath = __DIR__ . '/uploads/' . $fileName;
    
    $yamlContent = Yaml::dump($gunData, 2, 4);

    // YAMLファイルのダウンロード設定
    $fileName = $_POST['filename']; // ダウンロードされるファイル名
    header('Content-Type: application/x-yaml');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header('Content-Length: ' . strlen($yamlContent));

    // ファイルの内容を出力して即座にダウンロードさせる
    echo $yamlContent;
}