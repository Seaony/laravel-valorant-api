<?php

namespace Tests;

use Seaony\ValorantApi\ValorantAsset;

class ValorantAssetTest extends TestCase
{
    public function testAgents()
    {
        $this->assertIsArray(ValorantAsset::agents());
    }

    public function testAgentByUuid()
    {
        $data = ValorantAsset::agents();

        $this->assertIsArray(ValorantAsset::agentByUuid($data[0]['uuid']));
    }

    public function testBuddies()
    {
        $this->assertIsArray(ValorantAsset::buddies());
    }

    public function testBuddyByUuid()
    {
        $data = ValorantAsset::buddies();

        $this->assertIsArray(ValorantAsset::buddyByUuid($data[0]['uuid']));
    }

    public function testBuddyLevels()
    {
        $this->assertIsArray(ValorantAsset::buddyLevels());
    }

    public function testBuddyLevelByUuid()
    {
        $data = ValorantAsset::buddyLevels();

        $this->assertIsArray(ValorantAsset::buddyLevelByUuid($data[0]['uuid']));
    }

    public function testBundles()
    {
        $this->assertIsArray(ValorantAsset::bundles());
    }

    public function testBundleByUuid()
    {
        $data = ValorantAsset::bundles();

        $this->assertIsArray(ValorantAsset::bundleByUuid($data[0]['uuid']));
    }

    public function testCeremonies()
    {
        $this->assertIsArray(ValorantAsset::ceremonies());
    }

    public function testCeremonyByUuid()
    {
        $data = ValorantAsset::ceremonies();

        $this->assertIsArray(ValorantAsset::ceremonyByUuid($data[0]['uuid']));
    }

    public function testCompetitiveTiers()
    {
        $this->assertIsArray(ValorantAsset::competitiveTiers());
    }

    public function testCompetitiveTierByUuid()
    {
        $data = ValorantAsset::competitiveTiers();

        $this->assertIsArray(ValorantAsset::competitiveTierByUuid($data[0]['uuid']));
    }

    public function testContentTiers()
    {
        $this->assertIsArray(ValorantAsset::contentTiers());
    }

    public function testContentTierByUuid()
    {
        $data = ValorantAsset::contentTiers();

        $this->assertIsArray(ValorantAsset::contentTierByUuid($data[0]['uuid']));
    }

    public function testContracts()
    {
        $this->assertIsArray(ValorantAsset::contracts());
    }

    public function testContractByUuid()
    {
        $data = ValorantAsset::contracts();

        $this->assertIsArray(ValorantAsset::contractByUuid($data[0]['uuid']));
    }

    public function testCurrencies()
    {
        $this->assertIsArray(ValorantAsset::currencies());
    }

    public function testCurrencyByUuid()
    {
        $data = ValorantAsset::currencies();

        $this->assertIsArray(ValorantAsset::currencyByUuid($data[0]['uuid']));
    }

    public function testEvents()
    {
        $this->assertIsArray(ValorantAsset::events());
    }

    public function testEventByUuid()
    {
        $data = ValorantAsset::events();

        $this->assertIsArray(ValorantAsset::eventByUuid($data[0]['uuid']));
    }

    public function testGamemodes()
    {
        $this->assertIsArray(ValorantAsset::gamemodes());
    }

    public function testGamemodeByUuid()
    {
        $data = ValorantAsset::gamemodes();

        $this->assertIsArray(ValorantAsset::gamemodeByUuid($data[0]['uuid']));
    }

    public function testGamemodeEquippables()
    {
        $this->assertIsArray(ValorantAsset::gamemodeEquippables());
    }

    public function testGamemodeEquippableByUuid()
    {
        $data = ValorantAsset::gamemodeEquippables();

        $this->assertIsArray(ValorantAsset::gamemodeEquippableByUuid($data[0]['uuid']));
    }

    public function testGear()
    {
        $this->assertIsArray(ValorantAsset::gear());
    }

    public function testGearByUuid()
    {
        $data = ValorantAsset::gear();

        $this->assertIsArray(ValorantAsset::gearByUuid($data[0]['uuid']));
    }

    public function testLevelborders()
    {
        $this->assertIsArray(ValorantAsset::levelborders());
    }

    public function testLevelBorderByUuid()
    {
        $data = ValorantAsset::levelborders();

        $this->assertIsArray(ValorantAsset::levelBorderByUuid($data[0]['uuid']));
    }

    public function testMaps()
    {
        $this->assertIsArray(ValorantAsset::maps());
    }

    public function testMapByUuid()
    {
        $data = ValorantAsset::maps();

        $this->assertIsArray(ValorantAsset::mapByUuid($data[0]['uuid']));
    }

    public function testPlayerCards()
    {
        $this->assertIsArray(ValorantAsset::playerCards());
    }

    public function testPlayerCardByUuid()
    {
        $data = ValorantAsset::playerCards();

        $this->assertIsArray(ValorantAsset::playerCardByUuid($data[0]['uuid']));
    }

    public function testPlayerTitles()
    {
        $this->assertIsArray(ValorantAsset::playerTitles());
    }

    public function testPlayerTitleByUuid()
    {
        $data = ValorantAsset::playerTitles();

        $this->assertIsArray(ValorantAsset::playerTitleByUuid($data[0]['uuid']));
    }

    public function testSeasons()
    {
        $this->assertIsArray(ValorantAsset::seasons());
    }

    public function testSeasonByUuid()
    {
        $data = ValorantAsset::seasons();

        $this->assertIsArray(ValorantAsset::seasonByUuid($data[0]['uuid']));
    }

    public function testCompetitiveSeasons()
    {
        $this->assertIsArray(ValorantAsset::competitiveSeasons());
    }

    public function testCompetitiveSeasonByUuid()
    {
        $data = ValorantAsset::competitiveSeasons();

        $this->assertIsArray(ValorantAsset::competitiveSeasonByUuid($data[0]['uuid']));
    }

    public function testSprays()
    {
        $this->assertIsArray(ValorantAsset::sprays());
    }

    public function testSprayByUuid()
    {
        $data = ValorantAsset::sprays();

        $this->assertIsArray(ValorantAsset::sprayByUuid($data[0]['uuid']));
    }

    public function testSprayLevels()
    {
        $this->assertIsArray(ValorantAsset::sprayLevels());
    }

    public function testSprayLevelByUuid()
    {
        $data = ValorantAsset::sprayLevels();

        $this->assertIsArray(ValorantAsset::sprayLevelByUuid($data[0]['uuid']));
    }

    public function testThemes()
    {
        $this->assertIsArray(ValorantAsset::themes());
    }

    public function testThemeByUuid()
    {
        $data = ValorantAsset::themes();

        $this->assertIsArray(ValorantAsset::themeByUuid($data[0]['uuid']));
    }

    public function testWeapons()
    {
        $this->assertIsArray(ValorantAsset::weapons());
    }

    public function testWeaponByUuid()
    {
        $data = ValorantAsset::weapons();

        $this->assertIsArray(ValorantAsset::weaponByUuid($data[0]['uuid']));
    }

    public function testWeaponSkins()
    {
        $this->assertIsArray(ValorantAsset::weaponSkins());
    }

    public function testWeaponSkinByUuid()
    {
        $data = ValorantAsset::weaponSkins();

        $this->assertIsArray(ValorantAsset::weaponSkinByUuid($data[0]['uuid']));
    }

    public function testWeaponSkinChromas()
    {
        $this->assertIsArray(ValorantAsset::weaponSkinChromas());
    }

    public function testWeaponSkinChromaByUuid()
    {
        $data = ValorantAsset::weaponSkinChromas();

        $this->assertIsArray(ValorantAsset::weaponSkinChromaByUuid($data[0]['uuid']));
    }

    public function testWeaponSkinLevels()
    {
        $this->assertIsArray(ValorantAsset::weaponSkinLevels());
    }

    public function testWeaponSkinLevelByUuid()
    {
        $data = ValorantAsset::weaponSkinLevels();

        $this->assertIsArray(ValorantAsset::weaponSkinLevelByUuid($data[0]['uuid']));
    }

    public function version()
    {
        $this->assertIsArray(ValorantAsset::version());
    }

}