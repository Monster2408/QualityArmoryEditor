<?php

$uploaded = false;

if (isset($_POST) && isset($_FILES['gun_file'])) {
    $file = $_FILES['gun_file'];
    echo '<script>console.log(' . json_encode($file) . ')</script>';
    $file_name = $file['name'];
    // ファイルの中身を取得
    $file_content = file_get_contents($file['tmp_name']);
    // ファイルの中身を表示
    echo '<script>console.log(' . json_encode($file_content) . ')</script>';
    $uploaded = true;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>QualityArmoryEditor</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.min.css">
    <script src="https://cdn.jsdelivr.net/npm/yamljs@0.3.0/dist/yaml.min.js"></script>
</head>
<body>
    <header>
        <h1>QualityArmoryEditor</h1>
        <div class="language-panel">
            <button class="english" id="japanese_button">日本語</button>
            <button class="japanese" id="english_button">English</button>
        </div>
    </header>
    <?php if ($uploaded === false): ?>
        <div class="upload">
            <form enctype="multipart/form-data" action="./index.php" method="POST">
                <input type="hidden" name="name" value="value" />
                アップロード: <input name="gun_file" type="file" accept=".yml" />
                <input type="submit" value="ファイル送信" />
            </form>
        </div>
    <?php endif; ?>
    <div class="editor">
        <form action="./create.php" method="POST">
            <input type="hidden" name="filename" value="<?php 
                if ($uploaded) {
                    echo $file_name;
                } else {
                    echo 'gunfile.yml';
                }
            ?>">
            <div class="section">
                <div>
                    <label for="name">
                        <span class="japanese">銃名</span>
                        <span class="english">Gun Name</span>
                    </label><input type="text" name="name" id="name" require>
                </div>
                <div>
                    <label for="display_name">
                        <span class="japanese">表示名</span>
                        <span class="english">Display Name</span>
                    </label><input type="text" name="display_name" id="display_name" require>
                </div>
                <div>
                    <label for="id">
                        <span class="japanese">ID</span>
                        <span class="english">ID</span>
                    </label><input type="number" name="id" id="id" require>
                </div>
                <div>
                    <label for="variant">
                        <span class="japanese">バリアント</span>
                        <span class="english">Variant</span>
                    </label><input type="number" name="variant" id="variant" require>
                </div>
            </div>
            <div class="section">
                <h2 class="japanese">クラフト素材(Material,Durability,Amount)</h2>
                <h2 class="english">Crafting Requirements(Material,Durability,Amount)</h2>
                <div>
                    <div>
                        <label for="craftingRequirementsMaterial">Material</label><input type="text" name="craftingRequirementsMaterial" id="craftingRequirementsMaterial">
                    </div>
                    <div>
                        <label for="craftingRequirementsDurability">Durability</label><input type="number" name="craftingRequirementsDurability" id="craftingRequirementsDurability">
                    </div>
                    <div>
                        <label for="craftingRequirementsAmount">Amount</label><input type="number" name="craftingRequirementsAmount" id="craftingRequirementsAmount">
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Weapon Information</h2>
                <div>
                    <label for="weaponType">
                        <span class="japanese">武器タイプ</span>
                        <span class="english">Weapon Type</span>
                    </label><select name="weaponType" id="weaponType" require>
                        <option value="PISTOL">PISTOL</option>
                        <option value="SMG">SMG</option>
                        <option value="RPG">RPG</option>
                        <option value="RIFLE">RIFLE</option>
                        <option value="SHOTGUN">SHOTGUN</option>
                        <option value="FLAMER">FLAMER</option>
                        <option value="SNIPER">SNIPER</option>
                        <option value="BIG_GUN">BIG_GUN</option>
                        <option value="GRENADES">GRENADES</option>
                        <option value="SMOKE_GRENADES">SMOKE_GRENADES</option>
                        <option value="FLASHBANGS">FLASHBANGS</option>
                        <option value="INCENDARY_GRENADES">INCENDARY_GRENADES</option>
                        <option value="MINES">MINES</option>
                        <option value="MELEE">MELEE</option>
                        <option value="MISC">MISC</option>
                        <option value="AMMO">AMMO</option>
                        <option value="HELMET">HELMET</option>
                        <option value="MEDKIT">MEDKIT</option>
                        <option value="LAZER">LAZER</option>
                        <option value="BACKPACK">BACKPACK</option>
                        <option value="PARACHUTE">PARACHUTE</option>
                        <option value="CUSTOM">CUSTOM</option>
                    </select>
                </div>
                <!-- enableIronSights bool -->
                <div>
                    <label for="enableIronSights">
                        <span class="japanese">アイアンサイト</span>
                        <span class="english">Enable Iron Sights</span>
                    </label><input type="checkbox" name="enableIronSights" id="enableIronSights">
                </div>
                <!-- ammotype text -->
                <div>
                    <label for="ammoType">
                        <span class="japanese">弾薬タイプ</span>
                        <span class="english">Ammo Type</span>
                    </label><input type="text" name="ammoType" id="ammoType">
                </div>
                <!-- damage number -->
                <div>
                    <label for="damage">
                        <span class="japanese">ダメージ</span>
                        <span class="english">Damage</span>
                    </label><input type="number" name="damage" id="damage">
                </div>
                <!-- maxbullets number -->
                <div>
                    <label for="maxBullets">
                        <span class="japanese">最大弾数</span>
                        <span class="english">Max Bullets</span>
                    </label><input type="number" name="maxBullets" id="maxBullets">
                </div>
                <!-- price number -->
                <div>
                    <label for="price">
                        <span class="japanese">価格</span>
                        <span class="english">Price</span>
                    </label><input type="number" name="price" id="price">
                </div>
                <!-- material text -->
                <div>
                    <label for="material">
                        <span class="japanese">素材</span>
                        <span class="english">Material</span>
                    </label><input type="text" name="material" id="material">
                </div>
                <!-- bullets-per-shot number -->
                <div>
                    <label for="bulletsPerShot">
                        <span class="japanese">発射弾数</span>
                        <span class="english">Bullets Per Shot</span>
                    </label><input type="number" name="bulletsPerShot" id="bulletsPerShot">
                </div>
                <!-- maxBulletDistance number -->
                <div>
                    <label for="maxBulletDistance">
                        <span class="japanese">最大弾道距離</span>
                        <span class="english">Max Bullet Distance</span>
                    </label><input type="number" name="maxBulletDistance" id="maxBulletDistance">
                </div>
                <!-- firerate number -->
                <div>
                    <label for="fireRate">
                        <span class="japanese">銃(自動)の弾速</span>
                        <span class="english">Fire Rate</span>
                    </label><input type="number" name="fireRate" id="fireRate">
                </div>
                <!-- isAutomatic bool -->
                <div>
                    <label for="isAutomatic">
                        <span class="japanese">自動</span>
                        <span class="english">Is Automatic</span>
                    </label><input type="checkbox" name="isAutomatic" id="isAutomatic">
                </div>
                <!-- recoil number -->
                <div>
                    <label for="recoil">
                        <span class="japanese">反動</span>
                        <span class="english">Recoil</span>
                    </label><input type="number" step="0.1" name="recoil" id="recoil">
                </div>
                <!-- durability number -->
                <div>
                    <label for="durability">
                        <span class="japanese">耐久値</span>
                        <span class="english">Durability</span>
                    </label><input type="number" name="durability" id="durability">
                </div>
                <!-- maxItemStack number -->
                <div>
                    <label for="maxItemStack">
                        <span class="japanese">最大スタック数</span>
                        <span class="english">Max Item Stack</span>
                    </label><input type="number" name="maxItemStack" id="maxItemStack">
                </div>
                <!-- setZoomLevel number -->
                <div>
                    <label for="setZoomLevel">
                        <span class="japanese">ズームレベル</span>
                        <span class="english">Set Zoom Level</span>
                    </label><input type="number" step="0.1" name="setZoomLevel" id="setZoomLevel">
                </div>
                <div>
                    <label for="sway">
                        <span class="japanese">揺れ (Sway)</span>
                        <span class="english">Sway</span>
                    </label>
                    <div class="sway">
                        <label for="swayDefaultValue">
                            <span class="japanese">デフォルト値</span>
                            <span class="english">Default Value</span>
                        </label><input type="number" step="0.1" name="swayDefaultValue" id="swayDefaultValue">
                        <label for="swayDefaultMultiplier">
                            <span class="japanese">倍率</span>
                            <span class="english">Multiplier</span>
                        </label><input type="number" name="swayDefaultMultiplier" id="swayDefaultMultiplier">
                        <label for="swaySneakModifier">
                            <span class="japanese">しゃがみ修正</span>
                            <span class="english">Sneak Modifier</span>
                        </label><input type="checkbox" name="swaySneakModifier" id="swaySneakModifier">
                        <label for="swayMoveModifier">
                            <span class="japanese">移動修正</span>
                            <span class="english">Move Modifier</span>
                        </label><input type="checkbox" name="swayMoveModifier" id="swayMoveModifier">
                        <label for="swayRunModifier">
                            <span class="japanese">走行修正</span>
                            <span class="english">Run Modifier</span>
                        </label><input type="checkbox" name="swayRunModifier" id="swayRunModifier">
                        <label for="swayUnscopedModifier">
                            <span class="japanese">非スコープ修正</span>
                            <span class="english">Unscoped Modifier</span>
                        </label><input type="number" step="0.1" name="swayUnscopedModifier" id="swayUnscopedModifier">
                    </div>
                </div>
                <!-- delayForReload number -->
                <div>
                    <label for="delayForReload">
                        <span class="japanese">リロード遅延</span>
                        <span class="english">Delay For Reload</span>
                    </label><input type="number" step="0.1" name="delayForReload" id="delayForReload">
                </div>
                <!-- delayForShoot number -->
                <div>
                    <label for="delayForShoot">
                        <span class="japanese">射撃遅延</span>
                        <span class="english">Delay For Shoot</span>
                    </label><input type="number" step="0.1" name="delayForShoot" id="delayForShoot">
                </div>
                <!-- unlimitedAmmo bool -->
                <div>
                    <label for="unlimitedAmmo">
                        <span class="japanese">無制限弾薬</span>
                        <span class="english">Unlimited Ammo</span>
                    </label><input type="checkbox" name="unlimitedAmmo" id="unlimitedAmmo">
                </div>
                <!-- LightLevelOnShoot number -->
                <div>
                    <label for="LightLevelOnShoot">
                        <span class="japanese">射撃時の明るさ</span>
                        <span class="english">Light Level On Shoot</span>
                    </label><input type="number" name="LightLevelOnShoot" id="LightLevelOnShoot">
                </div>
                <!-- slownessOnEquip number -->
                <div>
                    <label for="slownessOnEquip">
                        <span class="japanese">装備時の鈍化</span>
                        <span class="english">Slowness On Equip</span>
                    </label><input type="number" name="slownessOnEquip" id="slownessOnEquip">
                </div>
            </div>

            <div class="section">
                <h2>Sound Settings</h2>
                <!-- weaponsounds -->
                <div>
                    <label for="weaponSounds">
                        <span class="japanese">武器サウンド</span>
                        <span class="english">Weapon Sounds</span>
                    </label><input type="text" name="weaponSounds" id="weaponSounds">
                </div>
                <!-- weaponsounds_volume number -->
                <div>
                    <label for="weaponsounds_volume">
                        <span class="japanese">武器サウンド音量</span>
                        <span class="english">Weapon Sounds Volume</span>
                    </label><input type="number" step="0.1" name="weaponsounds_volume" id="weaponsounds_volume">
                </div>
            </div>
            
            <div class="section">
                <h2>Other Settings</h2>

                <!-- KilledByMessage text -->
                <div>
                    <label for="KilledByMessage">
                        <span class="japanese">キルメッセージ</span>
                        <span class="english">Killed By Message</span>
                    </label><input type="text" name="KilledByMessage" id="KilledByMessage">
                </div>
                <!-- invalid bool -->
                <div>
                    <label for="invalid">
                        <span class="japanese">無効</span>
                        <span class="english">Invalid</span>
                    </label><input type="checkbox" name="invalid" id="invalid">
                </div>
                <!-- particles object -->
                <div>
                    <label for="particles">
                        <span class="japanese">パーティクル</span>
                        <span class="english">Particles</span>
                    </label>
                    <div class="particles">
                        <label for="bulletParticle">
                            <span class="japanese">弾丸パーティクル</span>
                            <span class="english">Bullet Particle</span>
                        </label><input type="text" name="bulletParticle" id="bulletParticle">
                        <label for="bulletParticleR">
                            <span class="japanese">R</span>
                        </label><input type="number" step="0.1" name="bulletParticleR" id="bulletParticleR">
                        <label for="bulletParticleG">
                            <span class="japanese">G</span>
                        </label><input type="number" step="0.1" name="bulletParticleG" id="bulletParticleG">
                        <label for="bulletParticleB">
                            <span class="japanese">B</span>
                        </label><input type="number" step="0.1" name="bulletParticleB" id="bulletParticleB">
                        <label for="bulletParticleData">
                            <span class="japanese">データ</span>
                            <span class="english">Particle Data</span>
                        </label><input type="number" step="0.1" name="bulletParticleData" id="bulletParticleData">
                        <label for="bulletParticleMaterial">
                            <span class="japanese">パーティクル素材</span>
                            <span class="english">Bullet Particle Material</span>
                        </label><input type="text" name="bulletParticleMaterial" id="bulletParticleMaterial">
                    </div>
                </div>
                <!-- Version_18_Support bool -->
                <div>
                    <label for="Version_18_Support">
                        <span class="japanese">バージョン1.8サポート</span>
                        <span class="english">Version 1.8 Support</span>
                    </label><input type="checkbox" name="Version_18_Support" id="Version_18_Support">
                </div>
                <!-- ChargingHandler text -->
                <div>
                    <label for="ChargingHandler">
                        <span class="japanese">チャージハンドラー</span>
                        <span class="english">Charging Handler</span>
                    </label><input type="text" name="ChargingHandler" id="ChargingHandler">
                </div>
                <!-- ReloadingHandler text -->
                <div>
                    <label for="ReloadingHandler">
                        <span class="japanese">リロードハンドラー</span>
                        <span class="english">Reloading Handler</span>
                    </label><input type="text" name="ReloadingHandler" id="ReloadingHandler">
                </div>
                <!-- addMuzzleSmoke bool -->
                <div>
                    <label for="addMuzzleSmoke">
                        <span class="japanese">マズルスモーク追加</span>
                        <span class="english">Add Muzzle Smoke</span>
                    </label><input type="checkbox" name="addMuzzleSmoke" id="addMuzzleSmoke">
                </div>
                <!-- drop-glow-color text -->
                <div>
                    <label for="dropGlowColor">
                        <span class="japanese">ドロップ時のグロー色</span>
                        <span class="english">Drop Glow Color</span>
                    </label><input type="text" name="dropGlowColor" id="dropGlowColor">
                </div>
                <!-- headshotMultiplier number -->
                <div>
                    <label for="headshotMultiplier">
                        <span class="japanese">ヘッドショット倍率</span>
                        <span class="english">Headshot Multiplier</span>
                    </label><input type="number" step="0.1" name="headshotMultiplier" id="headshotMultiplier">
                </div>
                <!-- firing_knockback number -->
                <div>
                    <label for="firing_knockback">
                        <span class="japanese">射撃時ノックバック</span>
                        <span class="english">Firing Knockback</span>
                    </label><input type="number" name="firing_knockback" id="firing_knockback">
                </div>
                <!-- DestructableMaterials text -->
                <div>
                    <label for="DestructableMaterials">
                        <span class="japanese">破壊可能な素材</span>
                        <span class="english">Destructable Materials</span>
                    </label><input type="text" name="DestructableMaterials" id="DestructableMaterials">
                </div>
                <!-- lastModifiedByQA number -->
                <div>
                    <label for="lastModifiedByQA">
                        <span class="japanese">QAによる最終修正</span>
                        <span class="english">Last Modified By QA</span>
                    </label><input type="number" name="lastModifiedByQA" id="lastModifiedByQA">
                </div>
            </div>

            <input type="submit" value="保存する">
        </form>
    </div>
</body>
<?php if ($uploaded): ?>
    <script>
    // YAMLファイルの内容をパースしてJavaScriptオブジェクトに変換
    nativeObject = YAML.parse(<?php echo json_encode($file_content); ?>);
    console.log(nativeObject);

    // 各フィールドに値をセット
    document.getElementById('name').value = nativeObject.name || '';
    document.getElementById('display_name').value = nativeObject.displayname || '';
    document.getElementById('id').value = (nativeObject.id !== undefined && nativeObject.id !== null) ? nativeObject.id : '';
    document.getElementById('variant').value = (nativeObject.variant !== undefined && nativeObject.variant !== null) ? nativeObject.variant : '';
    
    // クラフト素材 (Material, Durability, Amount)
    if (nativeObject.craftingRequirements && nativeObject.craftingRequirements.length > 0) {
        let craftingRequirements = nativeObject.craftingRequirements[0].split(',');
        document.getElementById('craftingRequirementsMaterial').value = craftingRequirements[0] || '';
        document.getElementById('craftingRequirementsDurability').value = craftingRequirements[1] || '';
        document.getElementById('craftingRequirementsAmount').value = craftingRequirements[2] || '';
    }

    document.getElementById('weaponType').value = nativeObject.weapontype || '';
    document.getElementById('weaponSounds').value = nativeObject.weaponsounds || '';
    document.getElementById('enableIronSights').checked = nativeObject.enableIronSights || false;
    document.getElementById('ammoType').value = nativeObject.ammotype || '';
    document.getElementById('damage').value = (nativeObject.damage !== undefined && nativeObject.damage !== null) ? nativeObject.damage : '';
    document.getElementById('maxBullets').value = (nativeObject.maxbullets !== undefined && nativeObject.maxbullets !== null) ? nativeObject.maxbullets : '';
    document.getElementById('price').value = (nativeObject.price !== undefined && nativeObject.price !== null) ? nativeObject.price : '';
    document.getElementById('material').value = nativeObject.material || '';
    document.getElementById('bulletsPerShot').value = (nativeObject['bullets-per-shot'] !== undefined && nativeObject['bullets-per-shot'] !== null) ? nativeObject['bullets-per-shot'] : '';
    document.getElementById('maxBulletDistance').value = (nativeObject.maxBulletDistance !== undefined && nativeObject.maxBulletDistance !== null) ? nativeObject.maxBulletDistance : '';
    document.getElementById('fireRate').value = (nativeObject.firerate !== undefined && nativeObject.firerate !== null) ? nativeObject.firerate : '';
    document.getElementById('isAutomatic').checked = nativeObject.isAutomatic || false;
    document.getElementById('recoil').value = (nativeObject.recoil !== undefined && nativeObject.recoil !== null) ? nativeObject.recoil : '';
    document.getElementById('KilledByMessage').value = nativeObject.KilledByMessage || '';
    document.getElementById('invalid').checked = nativeObject.invalid || false;
    document.getElementById('durability').value = (nativeObject.durability !== undefined && nativeObject.durability !== null) ? nativeObject.durability : '';
    document.getElementById('maxItemStack').value = (nativeObject.maxItemStack !== undefined && nativeObject.maxItemStack !== null) ? nativeObject.maxItemStack : '';
    document.getElementById('setZoomLevel').value = (nativeObject.setZoomLevel !== undefined && nativeObject.setZoomLevel !== null) ? nativeObject.setZoomLevel : '';

    // swayオブジェクト
    if (nativeObject.sway) {
        document.getElementById('swayDefaultValue').value = (nativeObject.sway.defaultValue !== undefined && nativeObject.sway.defaultValue !== null) ? nativeObject.sway.defaultValue : '';
        document.getElementById('swayDefaultMultiplier').value = (nativeObject.sway.defaultMultiplier !== undefined && nativeObject.sway.defaultMultiplier !== null) ? nativeObject.sway.defaultMultiplier : '';
        document.getElementById('swaySneakModifier').checked = nativeObject.sway.sneakModifier || false;
        document.getElementById('swayMoveModifier').checked = nativeObject.sway.moveModifier || false;
        document.getElementById('swayRunModifier').checked = nativeObject.sway.runModifier || false;
        document.getElementById('swayUnscopedModifier').value = (nativeObject.sway.unscopedModifier !== undefined && nativeObject.sway.unscopedModifier !== null) ? nativeObject.sway.unscopedModifier : '';
    }

    document.getElementById('delayForReload').value = (nativeObject.delayForReload !== undefined && nativeObject.delayForReload !== null) ? nativeObject.delayForReload : '';
    document.getElementById('delayForShoot').value = (nativeObject.delayForShoot !== undefined && nativeObject.delayForShoot !== null) ? nativeObject.delayForShoot : '';
    document.getElementById('unlimitedAmmo').checked = nativeObject.unlimitedAmmo || false;
    document.getElementById('LightLevelOnShoot').value = (nativeObject.LightLeveOnShoot !== undefined && nativeObject.LightLeveOnShoot !== null) ? nativeObject.LightLeveOnShoot : '';
    document.getElementById('slownessOnEquip').value = (nativeObject.slownessOnEquip !== undefined && nativeObject.slownessOnEquip !== null) ? nativeObject.slownessOnEquip : '';

    // particlesオブジェクト
    if (nativeObject.particles) {
        document.getElementById('bulletParticle').value = nativeObject.particles.bullet_particle || '';
        document.getElementById('bulletParticleR').value = (nativeObject.particles.bullet_particleR !== undefined && nativeObject.particles.bullet_particleR !== null) ? nativeObject.particles.bullet_particleR : '';
        document.getElementById('bulletParticleG').value = (nativeObject.particles.bullet_particleG !== undefined && nativeObject.particles.bullet_particleG !== null) ? nativeObject.particles.bullet_particleG : '';
        document.getElementById('bulletParticleB').value = (nativeObject.particles.bullet_particleB !== undefined && nativeObject.particles.bullet_particleB !== null) ? nativeObject.particles.bullet_particleB : '';
        document.getElementById('bulletParticleData').value = (nativeObject.particles.bullet_particleData !== undefined && nativeObject.particles.bullet_particleData !== null) ? nativeObject.particles.bullet_particleData : '';
        document.getElementById('bulletParticleMaterial').value = nativeObject.particles.bullet_particleMaterial || '';
    }

    document.getElementById('Version_18_Support').checked = nativeObject.Version_18_Support || false;
    document.getElementById('ChargingHandler').value = nativeObject.ChargingHandler || '';
    document.getElementById('ReloadingHandler').value = nativeObject.ReloadingHandler || '';
    document.getElementById('addMuzzleSmoke').checked = nativeObject.addMuzzleSmoke || false;
    document.getElementById('dropGlowColor').value = nativeObject['drop-glow-color'] || '';
    document.getElementById('headshotMultiplier').value = (nativeObject.headshotMultiplier !== undefined && nativeObject.headshotMultiplier !== null) ? nativeObject.headshotMultiplier : '';
    document.getElementById('weaponsounds_volume').value = (nativeObject.weaponsounds_volume !== undefined && nativeObject.weaponsounds_volume !== null) ? nativeObject.weaponsounds_volume : '';
    document.getElementById('firing_knockback').value = (nativeObject.firing_knockback !== undefined && nativeObject.firing_knockback !== null) ? nativeObject.firing_knockback : '';
    document.getElementById('DestructableMaterials').value = nativeObject.DestructableMaterials ? nativeObject.DestructableMaterials.join(', ') : '';
    document.getElementById('lastModifiedByQA').value = nativeObject.lastModifiedByQA || '';

    japanese_button = document.getElementById('japanese_button');
    english_button = document.getElementById('english_button');
    // 日本語ボタンが押されたとき
    japanese_button.addEventListener('click', function() {
        document.querySelectorAll('.japanese').forEach(function(element) {
            element.style.display = 'block';
        });
        document.querySelectorAll('.english').forEach(function(element) {
            element.style.display = 'none';
        });
    });

    // 英語ボタンが押されたとき
    english_button.addEventListener('click', function() {
        document.querySelectorAll('.japanese').forEach(function(element) {
            element.style.display = 'none';
        });
        document.querySelectorAll('.english').forEach(function(element) {
            element.style.display = 'block';
        });
    });

    // 最初は日本語を表示
    document.querySelectorAll('.english').forEach(function(element) {
        element.style.display = 'none';
    });
</script>

<?php endif; ?>

</html>