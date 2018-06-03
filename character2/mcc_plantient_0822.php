<!DOCTYPE html>
<html>
<head>
<title>Gen 2 MCC Plantient Character Generator</title>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
	<meta charset="UTF-8">
	<meta name="description" content="Mutant Crawl Classics Plantient Character Generator. Goodman Games.">
	<meta name="keywords" content="Mutant Crawl Classics, Jim Wampler, Goodman Games,HTML5,CSS,JavaScript">
	<meta name="author" content="Mark Tasaka 2018">
		

	<link rel="stylesheet" type="text/css" href="css/mcc_plantient2.css">
	<link rel="stylesheet" type="text/css" href="css/mcc_plantient_post.css">
    
    
    <script type="text/javascript" src="js/dieRoll.js"></script>

    <script type="text/javascript" src="js/abilityScoreMod.js"></script>
    <script type="text/javascript" src="js/profession.js"></script>
    <script type="text/javascript" src="js/birthAugur.js"></script>
    <script type="text/javascript" src="js/hitpoints.js"></script>
    <script type="text/javascript" src="js/adjustments.js"></script>
    <script type="text/javascript" src="js/plantientAppearance.js"></script>

    
</head>
<body>
	 
        <?php
    
    include 'php/artifacts.php';
    include 'php/adjustments.php';
    
    
        if(isset($_POST["theCharacterName"]))
        {
            $characterName = $_POST["theCharacterName"];
    
        }
    
        if(isset($_POST["thePlayerName"]))
        {
            $gamerName = $_POST["thePlayerName"];
        
        }    
    
        if(isset($_POST["theArchaicAlignment"]))
        {
            $archaicAlignment = $_POST["theArchaicAlignment"];
        }
    
        if(isset($_POST["theArtifact1"]))
        {
            $artifact1 = $_POST["theArtifact1"];
        }
    
    
        /*Bonus to AC value*/
        $acBonusFromArtifact = 0;
            
        /*Bonus to Strength value*/
        $strengthBonusFromArtifact = 0;
    
    

        $artifactName1 = getArtifact1($artifact1)[0];
        $artifactCheck1 = getArtifact1($artifact1)[1];
        $artifactEffect1 = getArtifact1($artifact1)[2];
    
        /*Determines whether Artifact grants AC bonus*/
        $acBonusFromArtifact1 = artifactAcBonus ($artifactName1, $acBonusFromArtifact);
    
        /*Determines whether Artifact grants strength bonus*/
        $strengthBonusFromArtifact1 = artifactStrengthBonus ($artifactName1, $strengthBonusFromArtifact);
    
    
        if(isset($_POST["theArtifact2"]))
        {
            $artifact2 = $_POST["theArtifact2"];
        }

        $artifactName2 = getArtifact1($artifact2)[0];
        $artifactCheck2 = getArtifact1($artifact2)[1];
        $artifactEffect2 = getArtifact1($artifact2)[2];
    
        /*Determines whether Artifact grants AC bonus*/
        $acBonusFromArtifact2 = artifactAcBonus ($artifactName2, $acBonusFromArtifact);
    
        /*Determines whether Artifact grants strength bonus*/
        $strengthBonusFromArtifact2 = artifactStrengthBonus ($artifactName2, $strengthBonusFromArtifact);
    
    
        if(isset($_POST["theArtifact3"]))
        {
            $artifact3 = $_POST["theArtifact3"];
        }

        $artifactName3 = getArtifact1($artifact3)[0];
        $artifactCheck3 = getArtifact1($artifact3)[1];
        $artifactEffect3 = getArtifact1($artifact3)[2];
    
        /*Determines whether Artifact grants AC bonus*/
        $acBonusFromArtifact3 = artifactAcBonus ($artifactName3, $acBonusFromArtifact);
    
        /*Determines whether Artifact grants strength bonus*/
        $strengthBonusFromArtifact3 = artifactStrengthBonus ($artifactName3, $strengthBonusFromArtifact);
    
    
    
        $totalArtifactAC = $acBonusFromArtifact1 +$acBonusFromArtifact2 + $acBonusFromArtifact3;
    
        $totalArtifactStrength = $strengthBonusFromArtifact1 +$strengthBonusFromArtifact2 + $strengthBonusFromArtifact3;
    
            
        if(isset($_POST["theWeaponName1"]))
        {
            $weaponName1 = $_POST["theWeaponName1"];
        }
                
        if(isset($_POST["theWeaponDamage1"]))
        {
            $weaponDamage1 = $_POST["theWeaponDamage1"];
        }
            
        if(isset($_POST["theWeaponName2"]))
        {
            $weaponName2 = $_POST["theWeaponName2"];
        }
                
        if(isset($_POST["theWeaponDamage2"]))
        {
            $weaponDamage2 = $_POST["theWeaponDamage2"];
        }
                    
            
        if(isset($_POST["theArmour"]))
        {
            $armourDesrcipt = $_POST["theArmour"];
        }

            
        if(isset($_POST["theArmourClassBonus"]))
        {
            $bonusToArmourClass = $_POST["theArmourClassBonus"];
        }
    
        $armourBonusToArmourClass = armourBonusToAC ($bonusToArmourClass);
              
        if(isset($_POST["theCheckPenArmour"]))
        {
            $armourPenCheck = $_POST["theCheckPenArmour"];
        }
                    
        if(isset($_POST["theSpeedPenArmour"]))
        {
            $armourPenToSpeed = $_POST["theSpeedPenArmour"];
        }
    
        $speedReduction = speedAdjustment ($armourPenToSpeed);
                               
                        
        if(isset($_POST["theFumbleArmour"]))
        {
            $armourFumble = $_POST["theFumbleArmour"];
        }
                            
        if(isset($_POST["theEquipmentTreasureBox"]))
        {
            $equipmentTreasure = $_POST["theEquipmentTreasureBox"];
        }
    
    
    ?>

  <img id="character_sheet"/>
    
    <!--jQuery version -->
   <section>
    	<p id="name"></p>
           
		<span id="profession"></span>
		<span id="strength"></span> <span id="strengthMod"></span>
		<span id="agility"></span>  <span id="agilityMod"></span>
           
		<span id="stamina"></span>  <span id="staminaMod"></span>
		<span id="personality"></span> <span id="personalityMod"></span>
		<span id="intelligence"></span> <span id="intelligenceMod"></span>
		<span id="luck"></span> <span id="luckMod"></span>
		  
    
		   
		<p id="birthAugur"><span id="luckySign"></span>: <span id="luckyRoll"></span> (<span id="LuckySignBonus"></span>)</p>
           
        <span id="baseAC"></span>
        <span id="level"></span>
        <span id="title"></span>
       
      
           
		<span id="hitPoints"></span> 
        
        
        <span id="ref"></span>
        <span id="fort"></span>
        <span id="will"></span>
		
       
        <span id="init"></span>
		<span id="melee"></span>
        <span id="range"></span>
		<span id="meleeDamage"></span>
        <span id="rangeDamage"></span>
           

        <span id="fumbleDie"></span>
           <span id="speed"></span>
           
		<span id="critDie"></span>
		<span id="critTable"></span>
           

        <div id="actionDiceGroup"><span id="actionDice"></span></div>
           
           <div id="artifactCheck">1d20<span id="artifactCheckBonus"></span></div>
           <span id="maxTech"></span>
       
           <span id="mutantAppearance"></span>
		   <span id="dieRollMethod"></span>
       
       <div id="languageGroup">
       <span id="languages"></span><span id="dialectLanguage"></span>
    <span id="additionalLanguages"></span>
           </div>
           
           <span id="physicalMutation0"></span>
           <span id="physicalMutationType0"></span>
       <span id="physicalMutationManifest0"></span>
       <span id="physicalMutationEffect0"></span>
       
       
           <span id="physicalMutation1"></span>
           <span id="physicalMutationType1"></span>
       <span id="physicalMutationManifest1"></span>
       <span id="physicalMutationEffect1"></span>
       
           <span id="physicalMutation2"></span>
           <span id="physicalMutationType2"></span>
       <span id="physicalMutationManifest2"></span>
       <span id="physicalMutationEffect2"></span>
       
           <span id="physicalMutation3"></span>
           <span id="physicalMutationType3"></span>
       <span id="physicalMutationManifest3"></span>
       <span id="physicalMutationEffect3"></span>
       
       
           <span id="mentalMutation0"></span>
           <span id="mentalMutationType0"></span>
       <span id="mentalMutationManifest0"></span>
       <span id="mentalMutationEffect0"></span>
       
       
           <span id="mentalMutation1"></span>
           <span id="mentalMutationType1"></span>
       <span id="mentalMutationManifest1"></span>
       <span id="mentalMutationEffect1"></span>
       
           <span id="mentalMutation2"></span>
           <span id="mentalMutationType2"></span>
       <span id="mentalMutationManifest2"></span>
       <span id="mentalMutationEffect2"></span>
       
       
           <span id="defect0"></span>
           <span id="defectType0"></span>
       <span id="defectEffect0"></span>
       
           <span id="defect1"></span>
           <span id="defectType1"></span>
       <span id="defectEffect1"></span>
       
       <span id="modifiedFumble"></span>
       
       <span id="modifiedSpeed"></span>
       
       <span id="modifiedArmourClass"></span>
       
       
         <span id="characterName">
           <?php
                echo $characterName;
           ?>
        </span>
       
              
       <span id="playerName">
           <?php
                echo $gamerName;
           ?>
        </span>
	                 
       <span id="arcAlignment">
           <?php
                echo $archaicAlignment;
           ?>
        </span>
	   
       	                 
       <span id="artifactName1">
           <?php
                echo $artifactName1;
           ?>
        </span>
              
       <span id="artifactCheck1">
           <?php
                echo $artifactCheck1;
           ?>
        </span>
              
       <span id="artifactEffect1">
           <?php
                echo $artifactEffect1;
           ?>
        </span>
      
              	                 
       <span id="artifactName2">
           <?php
                echo $artifactName2;
           ?>
        </span>
              
       <span id="artifactCheck2">
           <?php
                echo $artifactCheck2;
           ?>
        </span>
              
       <span id="artifactEffect2">
           <?php
                echo $artifactEffect2;
           ?>
        </span>
      
                     	                 
       <span id="artifactName3">
           <?php
                echo $artifactName3;
           ?>
        </span>
              
       <span id="artifactCheck3">
           <?php
                echo $artifactCheck3;
           ?>
        </span>
              
       <span id="artifactEffect3">
           <?php
                echo $artifactEffect3;
           ?>
        </span>


       
              
       <span id="weaponDescription1">
           <?php
                echo $weaponName1;
           ?>
        </span>
                     
       <span id="weaponDamage1">
           <?php
                echo $weaponDamage1;
           ?>
        </span>
       
              
       <span id="weaponDescription2">
           <?php
                echo $weaponName2;
           ?>
        </span>
                     
       <span id="weaponDamage2">
           <?php
                echo $weaponDamage2;
           ?>
        </span>
       
           
       <span id="armourDescription">
           <?php
                echo $armourDesrcipt;
           ?>
        </span>
                     
       <span id="armourBonus">
           <?php
                echo $bonusToArmourClass;
           ?>
        </span>
      
    
       <span id="armourPenalityCheck">
           <?php
                echo $armourPenCheck;
           ?>
        </span>
       
           
       <span id="armourSpeedPen">
           <?php
                echo $armourPenToSpeed;
           ?>
        </span>
                  
       <span id="fumbleArmourValue">
           <?php
                echo $armourFumble;
           ?>
        </span>
       
              <span id="equipmentGear">
           <?php
                echo $equipmentTreasure;
           ?>
        </span>
                     

	</section>
	

		
  <script>
      
      const NUMBER_OF_PHYSICAL_MUTATIONS = Math.floor(Math.random() * 4 + 1);
      const NUMBER_OF_MENTAL_MUTATIONS = 0; //Math.floor(Math.random() * 3 + 1);
      const NUMBER_OF_DEFECTS = 0; //Math.floor(Math.random() * 2 + 1);
	  

	  
	/*
	 Character() - Plantient Character Constructor
	*/
	function Character() {
	
    let strength = <?php echo $totalArtifactStrength ?> + rollDice(6, 4, 1, 0);
    let agility = rollDice(6, 4, 1, 0);
    let stamina = rollDice(6, 4, 1, 0);
    let	personality = rollDice(6, 4, 1, 0);
    let	intelligence = rollDice(6, 4, 1, 0);
    let	luck = rollDice(6, 4, 1, 0);
	let	profession = getProfession();
	let birthAugur = getLuckySign();
	let strengthModifier = getStrengthModifier(strength);
	let staminaModifier = getStaminaModifier(stamina);
	let agilityModifier = getAgilityModifier(agility);
	let personalityModifier = getPersonalityModifier(personality);
	let intelligenceModifier = getIntelligenceModifier(intelligence);
	let luckModifier = getLuckModifier(luck);
    let maxTechLevel = getMaxTechLevel(intelligence);
    let bonusLanguages = fnAddLanguages(intelligenceModifier, birthAugur, luckModifier);
    let mutant = getMutant();
    let arrPhysicalMutation = getPhysicalMutation();
    let arrMentalMutation = getMentalMutation();
    let arrDefect = getDefect();
    
		
		let mutantCharacter = {
			"name": "",
			"strength": strength,
			"agility": agility,
			"stamina": stamina,
			"personality": personality,
			"intelligence": intelligence,
			"luck": luck,
			"strengthModifier": strengthModifier,
			"agilityModifier": agilityModifier,
			"staminaModifier": staminaModifier,
			"personalityModifier": personalityModifier,
			"intelligenceModifier": intelligenceModifier,
			"luckModifier":  luckModifier,
			"profession":  profession.role,
			"luckySign": birthAugur.luckySign,
			"luckyRoll": birthAugur.luckyRoll,
			"luckySignBonus": getLuckModifier(luck),
            "level": mutant.level,
            "title": mutant.title,
			"hitPoints": hitPoints (mutant, staminaModifier, hitPointAdjustPerLevel(luckySign, luckModifier)),
			"ref": mutant.ref + agilityModifier + adjustRef(birthAugur, luckModifier),
			"fort": mutant.fort + staminaModifier + adjustFort(birthAugur,luckModifier),
			"will": mutant.will + personalityModifier + adjustWill(birthAugur, luckModifier),
            "init": agilityModifier + adjustInit(birthAugur, luckModifier),
			"melee": mutant.attackBonus + strengthModifier + meleeAdjust(birthAugur, getLuckModifier(luck)),
            "meleeDamageBonus": strengthModifier + adjustMeleeDamage(birthAugur, getLuckModifier(luck)),
			"range": mutant.attackBonus + agilityModifier + rangeAdjust(birthAugur, getLuckModifier(luck)),
            "rangeDamageBonus": /*agilityModifier + */adjustRangeDamage(birthAugur, getLuckModifier(luck)),
			"speed": 20 + addLuckToSpeed(birthAugur, getLuckModifier(luck)),
            "fumbleDie": "d4" + addSign(adjustFumble (birthAugur, getLuckModifier(luck))),
            "modifiedFumbleDie": "<?php echo $armourFumble ?>" + addSign(adjustFumble (birthAugur, getLuckModifier(luck))),
			"modifiedSpeed": 20 - <?php echo $speedReduction ?> + addLuckToSpeed(birthAugur, getLuckModifier(luck)),
			"critDie": mutant.critDie + "" + addSign(adjustCrit(birthAugur, getLuckModifier(luck))),
			"critTable": mutant.critTable,
            "actionDice20": 2,
            //"actionDice20": mutant.actionDice.includes("d20"),
            "actionDice16": 0,
            "actionDice14": 0,
            "artifactCheckBonus": intelligenceModifier + mutant.artifactCheckBonus,
            "techLevel": maxTechLevel,
            "languages": "Nu-Speak", 
            "dialectTongue": getDialectTonue(intelligence),
            "addLanguages": bonusLanguages,
            "acBonus": 0,
            "acLuckySign": adjustAC(birthAugur, getLuckModifier(luck)),
            "appearance": getPhysicalDescription(),
            "bodyMutationDetails": getMutationDetails(arrPhysicalMutation),
            "mindMutationDetails": getMentalMutationDetails(arrMentalMutation),
            "defectMutationDetails": getDefectDetails(arrDefect),
			"dieRollMethod": "4d6 (drop the lowest) ability scores, d4 physical mutations, no defects"
	
		};
        
        for(i=0;i<NUMBER_OF_PHYSICAL_MUTATIONS;i++) {
            if(mutantCharacter["bodyMutationDetails"][i].bodyMutationEffect[1]){
                
               curReturnValue = mutantCharacter["bodyMutationDetails"][i].bodyMutationEffect[1](mutantCharacter) || 0;
                if(curReturnValue == 19 ) {
                    tempBaseAC += curReturnValue;
                } else if(curReturnValue != 0) {
                    tempACModi += curReturnValue;
                }
            }
        }
        
        
        
        // mindMutationDetails
        for(j=0;j<NUMBER_OF_MENTAL_MUTATIONS;j++) {
            if(mutantCharacter["mindMutationDetails"][j].mindMutationEffect[1]){
                
               //curReturnValue = 
                   mutantCharacter["mindMutationDetails"][j].mindMutationEffect[1](mutantCharacter);
                //|| 0;
            }
        }
        
        /*Defects*/
        for(k=0;k<NUMBER_OF_DEFECTS;k++) {
            if(mutantCharacter["defectMutationDetails"][k].defectMutationEffect[1]){
                
               //curReturnValue = 
                   mutantCharacter["defectMutationDetails"][k].defectMutationEffect[1](mutantCharacter);
                //|| 0;
            }
        }
        
	    if(mutantCharacter.hitPoints <= 0 ){
			mutantCharacter.hitPoints = 1;
		}
		return mutantCharacter;
	  
	  }
	  
      /*
      * getter for physical mutation
      */
      function getMutationDetails(arrPhysicalMutation){
         let arrResult = [];
          for(i = 0; i < NUMBER_OF_PHYSICAL_MUTATIONS; i++){
              
              arrResult.push({ "bodyMutation": arrPhysicalMutation[i].mutation ,
                              "bodyMutationType": getPhysicalMutationType(arrPhysicalMutation[i]),
                              "bodyMutationManifest": getPhysicalMutationManifest(arrPhysicalMutation[i]),
                              "bodyMutationEffect": getPhysicalMutationEffect(arrPhysicalMutation[i])
                             });
          };
          return arrResult;
      }
      
	  
      /*
      * getter for mental mutation
      */
      function getMentalMutationDetails(arrMentalMutation){
         
          let arrResult = [];
          for(i = 0; i < NUMBER_OF_MENTAL_MUTATIONS; i++){
              arrResult.push({ "mindMutation": arrMentalMutation[i].mutation ,
                              "mindMutationType": getMentalMutationType(arrMentalMutation[i]),
                              "mindMutationManifest": getMentalMutationManifest(arrMentalMutation[i]),
                              "mindMutationEffect": getMentalMutationEffect(arrMentalMutation[i])
                             });
          };
        
          return arrResult;
      }

            
      /*
      * getter for defects
      */
      function getDefectDetails(arrDefect){
         
          let arrResult = [];
          for(i = 0; i < NUMBER_OF_DEFECTS; i++){
              arrResult.push({ "defectMutation": arrDefect[i].defect ,
                              "defectMutationType": getDefectType(arrDefect[i]),
                              "defectMutationEffect": getDefectEffect(arrDefect[i])
                             });
          };
        
          return arrResult;
      }
      
 
                  

      
      
/*	  
getPhysicalMutation() - returns a randomly generated Physical Mutation 
*/
function getPhysicalMutation(){
    
    let physicalMutation = [
        //Active Mutations 1-11
        {"id": 1, "mutation": "Amplimorph"},
        {"id": 2, "mutation": "Electrical Generation"},
        {"id": 3, "mutation": "Extra Senses"},
        {"id": 4, "mutation": "Gas Generation"},
        {"id": 5, "mutation": "Holographic Skin"},
        {"id": 6, "mutation": "Light Generation"},
        {"id": 7, "mutation": "Metamorph"},
        {"id": 8, "mutation": "Radiation Generation"},
        {"id": 9, "mutation": "Regeneration"},
        {"id": 10, "mutation": "Sonic Generation"},
        {"id": 11, "mutation": "Symbiotic Touch"},
        //Passive Mutations 12-26
        {"id": 12, "mutation": "Carapace"},
        {"id": 13, "mutation": "Claws"},
        {"id": 14, "mutation": "Heightened Agility"},
        {"id": 15, "mutation": "Heightened Stamina"},
        {"id": 16, "mutation": "Heightened Strength"},
        {"id": 17, "mutation": "Increased Speed"},
        {"id": 18, "mutation": "Infravision"},
        {"id": 19, "mutation": "Multiple Body Parts"},
        {"id": 20, "mutation": "New Body Parts"},
        {"id": 21, "mutation": "Plasticity"},
        {"id": 22, "mutation": "Shorter"},
        {"id": 23, "mutation": "Spines"},
        {"id": 24, "mutation": "Taller"},
        {"id": 25, "mutation": "Ultravision"},
        {"id": 26, "mutation": "Wings"}
	];
    //return physicalMutation[2];
    // return physicalMutation[Math.floor(Math.random() * physicalMutation.length)]; 
    let arrResult = [];
    for(i = 0; i< 4; ){
        let newObj = physicalMutation[Math.floor(Math.random() * physicalMutation.length)];
        
        if(!JSON.stringify(arrResult).includes(JSON.stringify(newObj))){
            arrResult.push(newObj);
            i++;
        } 
    }
    return arrResult;
}
   
    /* getPhysicalMutationType()
    */
      function getPhysicalMutationType(physicalMutation){
          
          let type = "Passive";
          
          if(physicalMutation.id <= 11){
              type = "Active";
          }
          
          return type;
      }
      

      
      

            
    function getPhysicalMutationManifest(physicalMutation){
        let arrPhysicalManifest = {
            1 : [
                      "The plantient doubles over in pain as the size change takes effect.",
                      "The plantient’s skin roils as muscle and bone reshape.",
                      "The plantient’s body appears to strobe as he changes size in small increments.",
                      "The plantient is surrounded by a nimbus of rotating electrons."
                  ],
            
            2 : [
                      "The plantient’s feet glow and a directional pulse of current travels through the ground to target.",
                      "The plantient’s hands glow and twin arcs of electricity shoot out from them to target.",
                      "The hair on the plantient’s body stands on end as a tesla arc of electricity jumps from the plantient’s mid-section to target.",
                      "The plantient’s body crackles and glows as balls of electricity form in the plantients hands that can be thrown at target."
                  ],
            
           3 : [
                      "The plantient has bat-like ears and can effectively see in the dark via echolocation.",
                      "The plantient has a flicking, extensible tongue which allows the plantient to sense other creatures and objects by taste and smell.",
                      "The plantient has insectoid antennae that act as motion detectors.",
                      "The plantient skin acts as a radiation detector, sensing micro-changes in heat and radiation."
           ],
            
           4 : [
                      "A jet of gas is exhaled from the plantient’s mouth.",
                      "Twin streams of gas pour from special orifices located in the palms of the plantients hands or manipulative members.",
                      "The plantient’s body exudes gas from pores in the plantient’s skin.",
                      "Through concentration, the plantient is able to transmute a localized pocket of air into an efficacious gas."
               
           ],
            
           5 : [
                      "The plantient’s appearance becomes that of a barely noticeable silhouette.",
                      "The plantient’s appearance briefly inverts into a color negative of itself before vanishing.",
                      "The plantient’s body shimmers in a rainbow banded light and then vanishes.",
                      "The plantient’s body appears to loose dimensionality, first along the horizontal plane, then along the vertical."
               
           ],
            
           6 : [
                      "The plantient’s hands flash brightly.",
                      "The plantient’s eyes shoot twin beams of light.",
                      "The plantient’s skin momentarily incandesces in a flash of light.",
                      "The plantient’s body is momentarily surrounded by a globe of bright light which collects itself at his chest before discharging."
               
           ],
            
           7 : [
                      "The plantient’s skin shimmers and twists as the change takes place.",
                      "The plantient’s body appears to rapidly rotate in multiple blurred bands of movement.",
                      "An image of the intended new shape flickers briefly in the plantient’s pupils immediately prior to the change.",
                      "The plantient’s body briefly becomes wavy and gelatinous as it transitions into the new shape."
               
           ],
            
           8 : [
                      "The plantient’s body glows with a bright blue halo.",
                      "The plantient’s hands are surrounded by a blue nimbus of orbiting electrons.",
                      "The plantient’s eyes fire twin blasts of searing blue light.",
                      "The plantient’s body flashes blue/white for one second, and then a small mushroom Cloud roils upwards from him or her."
               
           ],
            
           9 : [
                      "The plantient’s body is bathed in a soft white glow when healing.",
                      "The plantient’s body shimmers and sparkles as cells divide and regrow.",
                      "Any visible wounds on the plantient’s body immediately fill with an opaque white gel which solidifies into flesh and bone.",
                      "The plantient’s body roils as existing tissues shoot fleshy tendrils over wounds and then gradually rebuild damaged areas."
               
           ],

           10 : [
                      "Concentric waves of sonic energy erupt from the plantient’s mouth as a high-pitched scream.",
                      "The plantient’s fingertips project blasts of sonic energy.",
                      "A small organ in the plantient’s forehead emits sonic pulses.",
                      "The plantient emits pulsating waves of sonic energy directly from his or her chest."
               
           ],
            
           11 : [
                      "The plantient’s fingers end in tiny suction cups.",
                      "The plantient’s forearms shoot out serpentine tendrils.",
                      "Whatever part of the plantient that is in direct physical contact with the target merges with the skin of the target.",
                      "The plantient’s head is surrounded by a semi-transparent holographic projection of the face of the target creature."
               
           ],

           12 : [
                      "The plantient’s back and abdomen are encased in a turtle-like shell.",
                      "The plantient’s body is covered by a chitinous exoskeletal.",
                      "The plantient’s skin is like thick, spiked dinosaur hide.",
                      "The plantient’s body is covered in hexagonal granite-like epidermal cells."
               
           ],

           13 : [
                      "The plantient’s claws are composed of a razor sharp chitinous or bone-like material.",
                      "The plantient’s claws are comprised of organic duralloy.",
                      "The plantient’s Claws are molecular-edge carbon nano-structures.",
                      "The plantient’s claws are projected as edged plasma fields."
           ],

           14 : [
                      "The plantient’s metabolism runs at a superior rate and the rail-thin plantient must consume twice as many calories as normal.",
                      "The plantient’s genes carry fragments of mongoose DNA, causing increased reaction speed and giving the plantient a rat-like face.",
                      "The plantient’s nerve conduction velocity is accelerated to that of a radioactive spider.",
                      "The plantient’s brain is able to scan alternate future timelines in a limited fashion, and is thus better able to calculate body speed, position, and actions."
           ],

           15 : [
                      "The plantient’s skin appears as dull lead.",
                      "The plantient’s skin is the color of oxidized copper.",
                      "The plantient’s skin resembles chrome plating.",
                      "The plantient’s skin flashes metallic red briefly each time the plantient makes a Fortitude saving throw."
           ],

           16 : [
                      "The plantient’s body appears extremely over-muscled.",
                      "The plantient is abnormally short and squat, as though adapted for a higher gravity.",
                      "The plantient’s body glows dimly and converts nearby matter directly into kinetic energy whenever extreme strength is exercised.",
                      "The plantient’s body is composed of superdense ebony-colored elements and weighs 3x normal."
           ],

           17 : [
                      "The plantient’s movements, even when resting, appear jittery and shaky.",
                      "The plantient is unable to remain still or at rest, even when sleeping.",
                      "The plantient operates in a slightly different time frame, and does not appear to move at all, but strobes instantly from one position to the next.",
                      "The plantient’s movements cannot be followed by normal vision, as he is visible only as a blurred streak when acting at an accelerated pace."
           ],

           18 : [
                      "The plantient’s eyes reflect red light in the dark.",
                      "The plantient’s entire field of vision can be dimly seen in the dark as twin projected light beams.",
                      "The plantient’s eyes are entirely comprised of reddish pupils.",
                      "The plantient has a third eye placed center in the plantient’s forehead which actively broadcasts infrared light."
           ],

           19 : [
                      "The extra body parts are a different skin color (see Table 1-6, result 1-5).",
                      "The extra body parts are scaly or furry.",
                      "The extra body parts are skeletal or chitinous.",
                      "The extra body parts are metallic, and appear artificial."
           ],

           20 : [
                      "The new body parts are scaly.",
                      "The new body parts are furred.",
                      "The new body parts are skeletal or chitinous.",
                      "The new body parts are metallic, and appear artificial."
           ],

           21 : [
                      "The plantient’s body is supple and rubbery.",
                      "The plantient’s body and appendages are coiled and extensible.",
                      "The plantient’s body is gelatinous in nature with pseudopodic arms and legs.",
                      "The plantient’s body is comprised of an unknown quantum state of matter, able to add and subtract mass instantaneously."
           ],

           22 : [
                      "The plantient’s body is a scaled-down version of other members of his genotype.",
                      "The plantient’s body is shorter but just as wide as other members of his genotype.",
                      "The plantient’s body is shorter than other members of his genotype, but his lower legs and feet are extra-large.",
                      "The plantient’s upper body is normally proportioned, but he has no legs with feet attached directly to the torso."
           ],

           23 : [
                      "The plantient’s back and abdomen are covered in stiff quills.",
                      "The plantient’s forearms are covered with bony spines.",
                      "The plantient’s head has long sharp metallic quills, helmets and other head gear may not be worn.",
                      "The plantient’s skin contains thousands of sub-dermal pores containing short, chitinous bone spikes."
           ],
            

           24 : [
                      "The plantient’s body is a scaled-up version of other members of his genotype.",
                      "The plantient’s body is taller but much slimmer than other members of his genotype.",
                      "The plantient’s body is taller than other members of his genotype, but his lower legs and feet are extra-wide.",
                      "The plantient’s upper body is normally proportioned, but he his legs are much longer than other members of his genotype or species."
           ],
            

           25 : [
                      "The plantient’s eyes glow ultraviolet.",
                      "The plantient’s entire field of vision acts as a black light lamp, these purple beams are visible under dim lighting conditions.",
                      "The plantient’s eyes are entirely composed of dark purple pupils.",
                      "The plantient has a single cyclopean eye that is all-white with no visible iris or pupil."
           ],

           26 : [
                      "The plantient has wings of a type closely related to the plantient’s genotype (furred for mammals, feathered for avians, scaly for reptilians, etc.).",
                      "The plantient has wings of an unrelated type for the plantient’s genotype (insectoid or feathered wings on a mammal, and so on).",
                      "The plantient has wings comprised of a chrome-like organic metal.",
                      "The plantient has wings composed of electric-blue projected force fields."
           ]

        };
        return arrPhysicalManifest[physicalMutation.id][Math.floor(Math.random() * arrPhysicalManifest[physicalMutation.id].length)] ;
    }
    
      /*getPhysicalMutationEffect()
      */
      function getPhysicalMutationEffect(physicalMutation){
          
          let effect = "";
          let passiveData = {
              12: [
                    ["Failure, mutation results in cosmetic change only; non-protective skin change.", null], 
                    ["The plantient’s natural AC increases by +2.", 
                        function(obj) { obj["acBonus"] += 2;}], 
                    ["The plantient’s natural AC increases by +3, +1 to Fortitude saves.",
                        function (obj){ obj["acBonus"] += 3; obj["fort"] += 1;}],
                    ["The plantient’s natural AC increases by +4, +2 to Fortitude saves, speed reduced by 5’.",
                        function(obj){ obj["acBonus"] += 4; obj["fort"] += 2; obj["speed"] -= 5; obj["modifiedSpeed"] -=5;}],
                    ["The plantient’s natural AC increases by +5, +3 to Fortitude saves, speed reduced by 10’.", 
                        function(obj) { obj["acBonus"] += 5; obj["fort"] += 3; obj["speed"] -= 10; obj["modifiedSpeed"] -=10;}]
              ],
              
              13: [
                    ["Failure, mutation results in cosmetic change only; non-damaging claws.", null],
                    ["The plantient’s claws cause 1d3 damage per strike.", null],
                    ["The plantient’s claws cause 1d5 damage per strike.", null],
                    ["The plantient’s claws cause 1d7 damage per strike.", null],
                    ["The plantient’s claws cause 1d14 damage per strike; +1 to initiative rolls.", 
                        function(obj) { obj["init3"] += 1;}], 
                    ["The plantient’s claws cause 1d16 damage per strike; +2 to initiative rolls.", 
                        function(obj) { obj["init3"] += 2;}] 
                  
              ],
              
              14: [
                  ["Failure, mutation results in a cosmetic change only: hyperactive speech.", null],
                  
                  /*
			"range": plantient.attackBonus + agilityModifier + rangeAdjust(birthAugur, getLuckModifier(luck)),*/
                  
                  ["The plantient’s Agility score is increased by +1.",
                        function(obj) { obj["agility"] += 1; 
                                       if(obj["agility"] > 24) obj["agility"] =24;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);
                                      }], 
                  
                  
                  ["The plantient’s Agility score is increased by +2.",
                        function(obj) { obj["agility"] += 2;   
                                       if(obj["agility"] > 24) obj["agility"] =24;
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);
                                      }], 
                  
                  ["The plantient’s Agility score is increased by +3.",
                        function(obj) { obj["agility"] += 3;   
                                       if(obj["agility"] > 24) obj["agility"] =24;
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);
                                      }], 
                  
                  ["The plantient’s Agility score increases by +4;  base speed is increased to 35’.",
                        function(obj) { obj["agility"] += 4; 
                                       if(obj["agility"] > 24) obj["agility"] =24;
                                       obj["speed"] += 5; obj["modifiedSpeed"] +=5;obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);
                                      }], 
                  
                  ["The plantient’s Agility score increases by +6; AC is increased by +9 (ignore normal Agility modifier for AC); base speed is increased to 40’.",
                        function(obj) { obj["agility"] += 6; obj["acBonus"] == 19; obj["speed"] += 10; obj["modifiedSpeed"] +=10;
                                       if(obj["agility"] > 24) obj["agility"] =24;
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);
                                      }] 
              ],

              
              15: [
                  ["Failure, mutation results in a cosmetic change only: plantient’s skin does not appear to show external damage or trauma.", null],
                  
                  
                  ["The plantient’s Stamina score is increased by +1",
                        function(obj) { obj["stamina"] += 1;
                                       if(obj["stamina"] > 24) obj["stamina"] =24;  
                                       obj["staminaModifier"] = getStaminaModifier(obj["stamina"]);
                                       obj["fort"] = getMutant().fort + obj["staminaModifier"] + adjustFort(obj["luckySign"], obj["luckModifier"]);
                                       obj["hitPoints"] = hitPoints(getMutant(), obj["staminaModifier"], hitPointAdjustPerLevel(obj["luckySign"], obj["luckModifier"]));
                                      }], 
                  
                  ["The plantient’s Stamina score is increased by +2",
                        function(obj) { obj["stamina"] += 2;
                                       if(obj["stamina"] > 24) obj["stamina"] =24;  
                                       obj["staminaModifier"] = getStaminaModifier(obj["stamina"]);
                                       obj["fort"] = getMutant().fort + obj["staminaModifier"] + adjustFort(obj["luckySign"], obj["luckModifier"]);
                                       obj["hitPoints"] = hitPoints(getMutant(), obj["staminaModifier"], hitPointAdjustPerLevel(obj["luckySign"], obj["luckModifier"]));}], 
                  
                  ["The plantient’s Stamina score is increased by +3",
                        function(obj) { obj["stamina"] += 3;
                                       if(obj["stamina"] > 24) obj["stamina"] =24;  
                                       obj["staminaModifier"] = getStaminaModifier(obj["stamina"]);
                                       obj["fort"] = getMutant().fort + obj["staminaModifier"] + adjustFort(obj["luckySign"], obj["luckModifier"]);
                                       obj["hitPoints"] = hitPoints(getMutant(), obj["staminaModifier"], hitPointAdjustPerLevel(obj["luckySign"], obj["luckModifier"]));}],  
                  
                  ["The plantient’s Stamina score increases by +4; plantient is not vulnerable to electrical attacks.",
                        function(obj) { obj["stamina"] += 4;
                                       if(obj["stamina"] > 24) obj["stamina"] =24;  
                                       obj["staminaModifier"] = getStaminaModifier(obj["stamina"]);
                                       obj["fort"] = getMutant().fort + obj["staminaModifier"] + adjustFort(obj["luckySign"], obj["luckModifier"]);
                                       obj["hitPoints"] = hitPoints(getMutant(), obj["staminaModifier"], hitPointAdjustPerLevel(obj["luckySign"], obj["luckModifier"]));}],  
                  
                  ["The plantient’s Stamina score increases by +6; plantient is immune to heat attacks.",
                        function(obj) { obj["stamina"] += 6;
                                       if(obj["stamina"] > 24) obj["stamina"] =24;  
                                       obj["staminaModifier"] = getStaminaModifier(obj["stamina"]);
                                       obj["fort"] = getMutant().fort + obj["staminaModifier"] + adjustFort(obj["luckySign"], obj["luckModifier"]);
                                       obj["hitPoints"] = hitPoints(getMutant(), obj["staminaModifier"], hitPointAdjustPerLevel(obj["luckySign"], obj["luckModifier"]));}]
              ],
              
              
              16: [
                  ["Failure, mutation results in a cosmetic change only: plantient appears well-muscled.", null],
                  
                  ["The plantient’s Strength score is increased by +1.",
                        function(obj) { obj["strength"] += 1;
                                       if(obj["strength"] > 24) obj["strength"] =24;  
                                       obj["strengthModifier"] = getStrengthModifier(obj["strength"]);
                                       obj["melee"] = getMutant().attackBonus + obj["strengthModifier"] + meleeAdjust(obj["luckySign"], obj["luckModifier"]);
                                        obj["meleeDamageBonus"] = obj["strengthModifier"] + adjustMeleeDamage(obj["luckySign"], obj["luckModifier"]);
                                      }],
                  
                  ["The plantient’s Strength score is increased by +2.",
                        function(obj) { obj["strength"] += 2;
                                       if(obj["strength"] > 24) obj["strength"] =24;  
                                       obj["strengthModifier"] = getStrengthModifier(obj["strength"]);
                                       obj["melee"] = getMutant().attackBonus + obj["strengthModifier"] + meleeAdjust(obj["luckySign"], obj["luckModifier"]);
                                        obj["meleeDamageBonus"] = obj["strengthModifier"] + adjustMeleeDamage(obj["luckySign"], obj["luckModifier"]);}], 
                  
                  ["The plantient’s Strength score is increased by +3.",
                        function(obj) { obj["strength"] += 3;
                                       if(obj["strength"] > 24) obj["strength"] =24;  
                                       obj["strengthModifier"] = getStrengthModifier(obj["strength"]);
                                       obj["melee"] = getMutant().attackBonus + obj["strengthModifier"] + meleeAdjust(obj["luckySign"], obj["luckModifier"]);
                                        obj["meleeDamageBonus"] = obj["strengthModifier"] + adjustMeleeDamage(obj["luckySign"], obj["luckModifier"]);}], 
                  
                  ["The plantient’s Strength score increases by +4;  plantient’s speed is reduced by 5’.",
                        function(obj) { obj["strength"] += 4; obj["speed"] -= 5; obj["modifiedSpeed"] -=5;
                                       if(obj["strength"] > 24) obj["strength"] =24;  
                                       obj["strengthModifier"] = getStrengthModifier(obj["strength"]);
                                       obj["melee"] = getMutant().attackBonus + obj["strengthModifier"] + meleeAdjust(obj["luckySign"], obj["luckModifier"]);
                                        obj["meleeDamageBonus"] = obj["strengthModifier"] + adjustMeleeDamage(obj["luckySign"], obj["luckModifier"]);}], 
                  
                  ["The plantient’s Strength score increases by +6; plantient’s speed is reduced by 10’",
                        function(obj) { obj["strength"] += 6; obj["speed"] -= 10; obj["modifiedSpeed"] -=10;
                                       if(obj["strength"] > 24) obj["strength"] =24;  
                                       obj["strengthModifier"] = getStrengthModifier(obj["strength"]);
                                       obj["melee"] = getMutant().attackBonus + obj["strengthModifier"] + meleeAdjust(obj["luckySign"], obj["luckModifier"]);
                                        obj["meleeDamageBonus"] = obj["strengthModifier"] + adjustMeleeDamage(obj["luckySign"], obj["luckModifier"]);}]
              ],
              
              
              17: [
                  ["Failure, mutation results in a cosmetic change only: plantient is twitchy; constantly moving; rarely resting.", null],
                  ["The plantient’s movement speed is increased by +5’.",
                        function(obj) { obj["speed"] += 5; obj["modifiedSpeed"] +=5;}], 
                  ["The plantient’s movement speed is increased by +10’.",
                        function(obj) { obj["speed"] += 10; obj["modifiedSpeed"] +=10;}], 
                  ["The plantient’s movement speed is increased by +15’; gains additional d14 action die.",
                        function(obj) { obj["speed"] += 15; obj["modifiedSpeed"] +=15; 
                                       obj["actionDice14"] += 1;}], 
                  ["The plantient’s movement speed is increased by +20’;  gains additional d16 action die.",
                        function(obj) { obj["speed"] += 20; obj["modifiedSpeed"] +=20; obj["actionDice16"] += 1;}], 
                  ["The plantient’s movement speed is increased by +25’;  gains additional d20 action die.",
                        function(obj) { obj["speed"] += 25; obj["modifiedSpeed"] +=25; obj["actionDice20"] += 1;}]
              ],
              
              18: [
                  ["Failure, mutation results in a cosmetic change only (see manifestation).", null],
                  ["The plantient is able to see infrared heat sources up to 10’ distant.", null],
                  ["The plantient is able to see infrared heat sources up to 20’ distant.", null],
                  ["The plantient is able to see infrared heat sources up to 40’ distant.", null],
                  ["The plantient is able to see infrared heat sources up to 60’ distant, including residual heat signatures up to 10 minutes old.", null],
                  ["The plantient is able to see infrared heat sources up to 100’ distant, including residual heat signatures and cold spots up to 30 minutes old.", null]
              ],
              
              19: [
                  ["The plantient has 2 extra arms and gains a d16 additional action die for melee attacks only.",
                        function(obj) { obj["actionDice16"] += 1;}], 
                  ["The plantient has 2 extra legs and gains an additional 20’ to movement.",
                        function(obj) { obj["speed"] += 20; obj["modifiedSpeed"] +=20;}],
                  ["The plantient has 2 extra arms and gains a d20 additional action die for melee attacks only.",
                        function(obj) { obj["actionDice20"] += 1;}], 
                  ["The plantient has 2 extra arms and gains a d20 additional action die for melee attacks only; plantient also has 2 extra legs and gains + 30’ to movement.",
                        function(obj) { obj["actionDice20"] += 1; obj["speed"] += 30; obj["modifiedSpeed"] +=30;}], 
                  ["The plantient has 4 extra arms and gains a d20 additional action die for melee attacks only; also has 4 extra legs and gains + 40’ to movement.",
                        function(obj) { obj["actionDice20"] += 1; obj["speed"] += 40; obj["modifiedSpeed"] +=40;}]
              ],
              
              20: [
                  ["The plantient possesses antennae that allow the plantient to sense movement in a 360º arc; plantient cannot be surprised by moving creatures or objects.", null],
                  ["A long prehensile tail that acts as an extra arm; plantient gains an additional d16 action die for melee and missile attacks only*; +1 Agility.",
                        function(obj) { obj["actionDice16"] += 1; obj["agility"] += 1;
                                       if(obj["agility"] > 24) obj["agility"] =24;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}], 
                  ["The plantient possesses gills and may breathe underwater.", null],
                  ["The plantient possesses wings; plantient gains 30’ flying movement.", null],
                  ["The plantient possesses gills and finned arms, legs, and back; plantient may breathe underwater and gains 30’ swimming movement.", null]
              ],
              
              21: [
                  ["Failure, mutation results in cosmetic change only; plantient can contort arms and legs in a minimal fashion.", null],
                  ["The plantient is able to extend arms 10’ and may engage in melee at that range.", null],
                  ["The plantient is able to extend arms and legs 15’ and may engage in melee at that range; gains additional 15’ to movement. ",
                        function(obj) { obj["speed"] += 15; obj["modifiedSpeed"] +=15;}], 
                  ["The plantient is able to extend arms and legs 20’ and may engage in melee at that range; gains additional 20’ to movement; gains -1 to blunt force damage.",
                        function(obj) { obj["speed"] += 20; obj["modifiedSpeed"] +=20;}], 
                  ["The plantient is able to extend arms and legs 30’ and may engage in melee at that range; gains additional 30’ to movement; gains -1d3 to blunt force damage.",
                        function(obj) { obj["speed"] += 30; obj["modifiedSpeed"] +=30;}], 
                  ["The plantient is able to extend entire body 40’ and may engage in melee at that range; gains additional 40’ to movement; gains -1d6 to any blunt force dmg.",
                        function(obj) { obj["speed"] += 40; obj["modifiedSpeed"] +=40;}]
              ],
              
              22: [
                  ["Failure, mutation results in cosmetic change only; plantient is only slightly shorter than average for his genotype and species.", null],
                  ["The plantient is 1’ shorter than average members of his genotype and species; AC increases by +1. ", 
                        function(obj) { obj["acBonus"] += 1; }], 
                  ["The plantient is 2’ shorter than average members of his genotype and species; AC increases by +2, normal mv speed is reduced by 5’/round.", 
                        function(obj) { obj["acBonus"] += 2; obj["speed"] -= 5; obj["modifiedSpeed"] -=5;}], 
                  ["The plantient is 3’ shorter than average members of his genotype and species; AC increases by +3, normal move speed reduced by 10’/round",
                        function(obj) { obj["acBonus"] += 3; obj["speed"] -= 10; obj["modifiedSpeed"] -=10;}], 
                  ["The plantient is 1/3 the height of average members of his genotype and species; AC increases by +4, normal movement speed reduced by 15’.",
                        function(obj) { obj["acBonus"] += 4; obj["speed"] -= 15; obj["modifiedSpeed"] -=15;}] 
              ],
              
              23: [
                  ["Failure, mutation results in cosmetic change only; quills or spines are non-functional.", null],
                  ["The plantient’s AC +1; plantient may fire quills/spines for 1d4 damage against a single target.", 
                        function(obj) { obj["acBonus"] += 1;}], 
                  ["The plantient’s AC +2; plantient may fire quills/spines for 1d6 damage against a single target.", 
                        function(obj) { obj["acBonus"] += 2;}], 
                  ["The plantient’s AC +3; plantient may fire quills/spines for 2d6 damage against a single target, or for 1d6 each against two adjacent targets.", 
                        function(obj) { obj["acBonus"] += 3;}], 
                  ["The plantient’s AC +3; plantient may fire quills/spines for 3d6 damage against a single target, or for 1d6 each against three adjacent targets.", 
                        function(obj) { obj["acBonus"] += 3;}], 
                  ["The plantient’s AC +5, +2 to Ref saves; plantient may fire quills/spines for 4d6 damage against a single target, or for 1d6 each against 4 adjacent targets.", 
                        function(obj) { obj["acBonus"] += 5; obj["ref"] += 2;}] 
              ],
              
              24: [
                  ["Failure, mutation results in cosmetic change only; plantient is only slightly taller than average for his genotype and species.", null],
                  ["The plantient is 1’ taller than average members of his genotype and species; plantient gains +1 to Strength and AC  -1.", 
                        function(obj) { obj["acBonus"] -= 1; obj["strength"] += 1;
                                       obj["strengthModifier"] = getStrengthModifier(obj["strength"]);
                                       obj["melee"] = getMutant().attackBonus + obj["strengthModifier"] + meleeAdjust(obj["luckySign"], obj["luckModifier"]);
                                        obj["meleeDamageBonus"] = obj["strengthModifier"] + adjustMeleeDamage(obj["luckySign"], obj["luckModifier"]);}], 
                  
                  ["The plantient is 2’ taller than average members of his genotype and species; plantient gains +2 to Strength, +5’ to movement speed, and AC  -2.", 
                        function(obj) { obj["acBonus"] -= 2; obj["strength"] += 2; obj["speed"] += 5; obj["modifiedSpeed"] +=5; 
                                       obj["strengthModifier"] = getStrengthModifier(obj["strength"]);
                                       obj["melee"] = getMutant().attackBonus + obj["strengthModifier"] + meleeAdjust(obj["luckySign"], obj["luckModifier"]);
                                        obj["meleeDamageBonus"] = obj["strengthModifier"] + adjustMeleeDamage(obj["luckySign"], obj["luckModifier"]);}], 
                  
                  ["The plantient is 3’ taller than average members of his genotype and species; plantient gains +3 to Strength, +10’ to movement speed, and AC  -3.",
                        function(obj) { obj["acBonus"] -= 3; obj["strength"] += 3; obj["speed"] += 10; obj["modifiedSpeed"] +=10;
                                       obj["strengthModifier"] = getStrengthModifier(obj["strength"]);
                                       obj["melee"] = getMutant().attackBonus + obj["strengthModifier"] + meleeAdjust(obj["luckySign"], obj["luckModifier"]);
                                        obj["meleeDamageBonus"] = obj["strengthModifier"] + adjustMeleeDamage(obj["luckySign"], obj["luckModifier"]);}]/*, 
                  
                  ["The plantient towers over others at approximately 10’ in height; plantient gains +5 to Strength, AC  -4, movement speed is 50’, and HD changes to d10.", function(obj) {
                      hitPointsEachLevelLimit = 10; 
                      obj["acBonus"] -= 4; obj["strength"] += 5; obj["speed"] += 20; obj["modifiedSpeed"] +=20;
                      //obj["hitPoints"] = hitPoints (plantient, staminaModifier, hitPointAdjustPerLevel(luckySign, luckModifier));
                      //return -1;
                  }], 
                  
                  ["The plantient is huge at approximately 12’ in height; plantient gains +6 to Strength, AC  -5, movement is 60’, and HD changes to d12.", function(obj) {hitPointsEachLevelLimit = 12; obj["acBonus"] -= 5; obj["strength"] += 6; obj["speed"] += 30; obj["modifiedSpeed"] +=30;
                    //return -1;
                    }]*/
              ],
              
              25: [
                  ["Failure, mutation results in a cosmetic change only (see manifestation).", null],
                  ["The plantient is able to see in the ultraviolet range, up to 10’ distant; plantient has full vision in any outdoor situation, no matter how dark.", null],
                  ["The plantient is able to see in the ultraviolet range, up to 20’ distant; plantient has full vision in any outdoor or underground situation, no matter how dark.", null],
                  ["The plantient is able to see microwave sources and transmissions up to 40’; plantient’s vision may inflict 2d6 of heat damage to a single target as an action.", null],
                  ["The plantient is able to see infrared heat sources up to 100’ distant, including residual heat signatures and cold spots up to 30 minutes old.", null]
              ],
              
              26: [
                  ["Failure, mutation results in cosmetic change only; non-functional wings.", null],
                  ["The plantient’s wings are capable of level gliding for distances up to 40’/round, or 1/2 speed carrying up to 50 lbs.", null],
                  ["The plantient’s wings are capable of powered flight for distances up to 50’/round, or 1/2 speed carrying up to 100 lbs.", null],
                  ["The plantient’s wings are capable of powered flight for distances up to 60’/round, or 1/2 speed carrying up to 150 lbs.", null],
                  ["The plantient’s wings are capable of powered flight for distances up to 70’/round, or 1/2 speed carrying up to 200 lbs. or full str capacity, whichever is greater.", null],
                  ["The plantient’s wings are capable of powered flight for distances up to 80’/round, or 1/2 speed carrying up to full strength capacity.", null]
              ]
              
              
              
          };
          if(physicalMutation.id < 12){
              effect = ["A mutation check roll each time the active mutation is used.", null];
          } else {
            /*  objTodo = passiveData[physicalMutation.id][Math.floor(Math.random() * passiveData[physicalMutation.id].length)];
              effect = objTodo[0];
              objTodo[1]();*/
             effect = passiveData[physicalMutation.id][Math.floor(Math.random() * passiveData[physicalMutation.id].length)];
             //effect = passiveData[12][Math.floor(Math.random() * passiveData[12].length)];
         }
          return effect;
            
      }
      
              

        
       
/*	  
getMentalMutation() - returns a randomly generated Physical Mutation 
*/
function getMentalMutation(){
    
    let mentalMutation = [
        //Active Mutations 1-23
        {"id": 1, "mutation": "Cryokinesis"},
        {"id": 2, "mutation": "Death Field Generation"},
        {"id": 3, "mutation": "Devolution"},
        {"id": 4, "mutation": "Domination"},
        {"id": 5, "mutation": "Empathy"},
        {"id": 6, "mutation": "Force Field Generation"},
        {"id": 7, "mutation": "Illusion Generation"},
        {"id": 8, "mutation": "Life Force Reflection"},
        {"id": 9, "mutation": "Magnetic Control"},
        {"id": 10, "mutation": "Mind Control"},
        {"id": 11, "mutation": "Mental Blast"},
        {"id": 12, "mutation": "Mental Shield"},
        {"id": 13, "mutation": "Mental Reflection"},
        {"id": 14, "mutation": "Molecular Disruption"},
        {"id": 15, "mutation": "Molecular Integration"},
        {"id": 16, "mutation": "Pyrokinesis"},
        {"id": 17, "mutation": "Telekinesis"},
        {"id": 18, "mutation": "Telepathy"},
        {"id": 19, "mutation": "Teleportation"},
        {"id": 20, "mutation": "Temporary Invulnerability"},
        {"id": 21, "mutation": "Thought Spike"},
        {"id": 22, "mutation": "Time Sense"},
        {"id": 23, "mutation": "Time Stop"},
        //Passive Mutations 24-26
        {"id": 24, "mutation": "Absorption"},
        {"id": 25, "mutation": "Dual Brain"},
        {"id": 26, "mutation": "Heightened Intelligence"}
	];
    //return physicalMutation[2];
    // return physicalMutation[Math.floor(Math.random() * physicalMutation.length)]; 
    let arrResult = [];
   // console.log("test");
    for(i = 0; i< 3; ){
        let newObj = mentalMutation[Math.floor(Math.random() * mentalMutation.length)];
        
        if(!JSON.stringify(arrResult).includes(JSON.stringify(newObj))){
            arrResult.push(newObj);
            i++;
        } 
    }
    return arrResult;
}
   
    /* getPhysicalMutationType()
    */
      function getMentalMutationType(mentalMutation){
          
          let type = "Passive";
          
          if(mentalMutation.id <= 23){
              type = "Active";
          }
          
          return type;
      }     
      
      
    /*getMentalMutationManifest
    */
    function getMentalMutationManifest(mentalMutation){
        let arrMentalManifest = {
            1 : [
                      "A dense ice fog rolls off the plantient’s body.",
                      "The plantient’s skin is icy blue and eyes are a cold, glazed white.",
                      "The plantient’s body becomes temporarily encased in layer of snow.",
                      " The plantient’s body temporarily becomes glassy, semi-transparent, and extremely cold to the touch."
                  ],
            
            2 : [
                      "The plantient’s body is surrounded in a dark-violet nimbus.",
                      "The plantient’s body exudes the ghastly smell of rotting corpses.",
                      "Skin on the plantient’s head becomes temporarily transparent, exposing the skull.",
                      "The plantient’s hands and arms or equivalent limbs have no flesh, and are skeletal."
                  ],
            
            3 : [
                      "The plantient’s forehead glows a bright green.",
                      "A bright green ray is projected from the plantient’s eyes.",
                      "The plantient’s hands are surrounded by a glowing green aureole resembling ever-changing DNA strands."
                  ],
            
            4 : [
                      "The plantient’s eyes glow with an intense yellow light.",
                      "The plantient’s facial features become temporarily beatific.",
                      "The plantient’s merest hand gesture produces sparkles in the air.",
                      "A spinning hypnotic pinwheel of light appears above the plantient’s head."
                  ],
            
            5 : [
                      "The plantient’s eyes glow warmly behind closed lids.",
                      "The plantient’s head is encircled and suffused with a warm glow.",
                      "The plantient’s face suddenly transforms into a semblance of the target creature.",
                      "For a flickering instant, the plantient and target creature appear to exchange bodies and places."
                  ],
            
            6 : [
                      "The plantient generates a force field that is completely invisible.",
                      "The plantient generates a force screen that causes the air to ripple in a wavy pattern and hums noticeably.",
                      "The plantient is surrounded by wall of translucent blue light.",
                      "The plantient’s force field appears as a yellow-orange hexagonal grid that waves and undulates."
                  ],
            
            7 : [
                      "The plantient’s eyes turn all-white.",
                      "The plantient must touch the forefingers of one hand to his forehead.",
                      "The plantient’s forehead appears to ripple in concentric circles.",
                      "The plantient appears to be is surrounded by a rotating miasma of polychromatic chaos."
                  ],
            
            8 : [
                      "The plantient’s appearance momentarily shimmers and sparkles.",
                      "A circular field of mirroring energy appears in front of the plantient.",
                      "The plantient’s body visibly distorts, bowing slightly before rebounding.",
                      "The plantient’s body momentarily becomes a silhouetted doorway into another dimension."
                  ],
            
            9 : [
                      "The air ripples between the plantient and target object whenever this mutation is used.",
                      "The plantient’s body is surrounded by visible magnetic lines of force when mutation is used.",
                      "The plantient’s complexion darkens noticeably as the ferrous materials in his or his bloodstream align.",
                      "The plantient’s body temporarily becomes metallic and chilled to the touch."
                  ],
            
            10 : [
                      "The plantient’s head is bald, and the plantient has arched eyebrows.",
                      "The plantient’s eyes appear to be momentarily lit as though by a soft spotlight, even in the dark.",
                      "The plantient’s merest glance causes involuntary flinching in others.",
                      "The plantient’s skull and other head tissues become momentarily transparent, revealing his or her brain."
                  ],
            
            11 : [
                      "A narrow beam of white light shoots directly from the plantient’s forehead.",
                      "A torch of jagged white energy flares from the plantient’s head.",
                      "Concentric rings of white light radiate from the heads of the plantient and all of his or her targets.",
                      "A piercing white noise whine emanates from the bones in the plantient’s skull."
                  ],
            
            12 : [
                      "The plantient generates a mental shield that appears as a translucent blue-green sphere around the plantient’s head.",
                      "The plantient generates a mental shield that appears as an illusory riveted metal band around the plantient’s forehead.",
                      "The plantient’s mental shield manifests as numerous small, glowing crystals that orbit the plantient’s head."
                  ],
            
            13 : [
                      "The plantient’s appearance momentarily glimmers and gleams.",
                      "An octagonal field of reflective energy appears in front of the plantient.",
                      "The air around the plantient’s head appears to distort, warping slightly before rebounding.",
                      "The plantient’s eyes momentarily become blackened twin orbs."
                  ],
            
            14 : [
                      "The plantient’s hands project a bright yellow ray of light that sizzles when it hits target.",
                      "The plantient’s eye’s send out twin beams of searing red-orange energy that zigzags unerringly towards targets.",
                      "The plantient’s forefinger casts forth a pulsating red beam that whines rhythmically.",
                      "The plantient’s body momentarily flashes as a bright green silhouette revealing a photo-reversed black skeleton inside."
                  ],
            
            15 : [
                      "The plantient’s hands glow with a bluish white light.",
                      "The plantient’s hands radiate bluewhite rings of concentric energy.",
                      "The plantient’s hands cast forth a pulsating blue-white light that bathes target creature or object in an angelic glow.",
                      "The plantient’s entire body is bathed in a cascading shower of blue-white sparkles which gradually flow over to target creature or object."
                  ],
            
            16 : [
                      "The plantient’s body begins to shimmer with ripples of heated air.",
                      "The plantient’s body starts to glow, beginning with a dull red and eventually becoming white hot.",
                      "The plantient’s body hums as he begins to broadcast microwave radiation.",
                      "The plantient’s hands catch fire as they become sheathed in glowing plasma."
                  ],
            
            17 : [
                      "Segmented lines of translucent force are visible between the plantient’s head and target object.",
                      "The plantient’s head is surrounded by a translucent white sphere of energy when mutation is used.",
                      "The plantient’s eyes become all-white when this mutation is used.",
                      "Huge translucent hands manifest around target whenever this mutation is used."
                  ],
            
            18 : [
                      "The irises of the plantient’s eyes vanish.",
                      "The plantient’s head is encircled with a subtle white glow.",
                      "The plantient’s eyebrows are arched.",
                      "A shrill sonic hum fills the air."
                  ],
            
            19 : [
                      "The ground immediately around the plantient explodes in a harmless but loud display of smoke and pyrotechnics.",
                      "The teleported persons or objects slowly dissolve into a swirling cloud of golden twinkling sparkles which fade away accompanied by...",
                      "The surface of the teleported persons or objects begins to crawl with tiny forked arcs of electricity as they vanish and reappear elsewhere",
                      "A ring of violaceous energy grows to surround one end of the teleported persons or objects, and as it passes over them to the other end..."
                  ],
            
            20 : [
                      "The plantient’s body twinkles and sparkles subtly when attacked.",
                      "All objects, including clothes and possessions, are pushed away from the plantient’s body by 1/4 inch.",
                      "For a microsecond the plantient’s body appears to shift into a sideways dimension."
                  ],
            
            21 : [
                      "Transparent red bands of ribboned energy rotate around the plantient’s head in elliptical patterns.",
                      "The plantient’s head appears to enveloped in a jet of cool red flames, obscuring all of his facial features.",
                      "The plantient’s head appears to transform into a red ruby-like material.",
                      "An ethereal red armet appears around the plantient’s head."
                  ],
            
            22 : [
                      "The plantient’s face appears to blur horizontally as his eyes glow with a deep crimson light.",
                      "The plantient becomes semi-transparent as his form appears to revolve vertically around a central axis (does not effect the true...",
                      "Whenever the plantient moves while this mutation is activated, his physical form appears to strobe into three identical forms..."
                  ],
            
            23 : [
                      "Target color-shifts towards the red spectrum.",
                      "Target is surrounded by a shifting waves of banded color.",
                      "Target becomes a black silhouette of no-light.",
                      "Target’s form blurs but freezes in place."
                  ],
            
            24 : [
                      "The plantient skin ripples each time he is struck.",
                      "The plantient’s complexion deepens and he appears healthier.",
                      "The air around the plantient’s body shimmers when attacked.",
                      "The plantient is suffused in a warm pink glow."
                  ],
            
            25 : [
                      "The plantient’s second brain is located in a large and pronounced bump in the forehead of the skull.",
                      "The plantient’s second brain is located at the base of the spine or equivalent body form.",
                      "The plantient’s second brain is located in a second head.",
                      "The plantient’s second brain is located in a small malformed twin that is embedded in the plantient’s chest."
                  ],
            
            26 : [
                      "The plantient’s head is overlarge with an extended, tall forehead.",
                      "The plantient’s head is bald and body is hairless.",
                      "The plantient’s body beneath the neck is notably atrophied.",
                      "The plantient appears to be a far-future highly-evolved version, with slender body, slight facial features, and overlarge head and eyes."
                  ]
                 
      
        };
        
        return arrMentalManifest[mentalMutation.id][Math.floor(Math.random() * arrMentalManifest[mentalMutation.id].length)] ;
    }
      
      
    /*getMentalMutationEffect()
      */
      function getMentalMutationEffect(mentalMutation){
          
          let effect = "";
          let passiveData = {
              24: [
                  ["Failure, mutation results in cosmetic change only; plantient appears to roll with the punches exceptionally well.", null],
                  ["The plantient absorbs kinetic energy; takes only 1/2 damage from normal melee and missile attacks.", null],
                  ["The plantient absorbs kinetic energy; takes only 1/2 damage from normal melee and missile attacks and gains 1d3 hp (up to hp max) from each attack.", null],
                  ["The plantient absorbs kinetic energy; takes only 1/2 damage from normal melee and missile attacks and gains 1d6 hp (up to hp max) from each attack.", null],
                  ["The plantient absorbs kinetic energy; takes 1/2 damage from normal melee and missile attacks and gains 1 HD in hp (up to hp max) from each attack.", null]
              ],
              
              25: [
                  ["Failure, mutation results in cosmetic change only; plantient has non-functional second brain.", null],
                  
                  /*
            "artifactCheckBonus": intelligenceModifier + plantient.artifactCheckBonus,
                  */
                  ["The plantient’s Intelligence score increases by +2.", 
                        function(obj) { obj["intelligence"] += 2;
                                       if(obj["intelligence"] > 24) obj["intelligence"] =24;  
                                       obj["intelligenceModifier"] = getIntelligenceModifier(obj["intelligence"]);
                                       obj["techLevel"] = getMaxTechLevel(obj["intelligence"]);
                                       obj["addLanguages"] = fnAddLanguages(obj["intelligenceModifier"], obj["luckySign"], obj["luckModifier"]);
                                      obj["artifactCheckBonus"] = obj["intelligenceModifier"] + getMutant().artifactCheckBonus;
                                      }],
                  
                  ["The plantient’s Intelligence score increases by +3; gains additional +1 to Willpower saves.", 
                        function(obj) { obj["intelligence"] += 3; obj["will"] += 1;
                                       if(obj["intelligence"] > 24) obj["intelligence"] =24;  
                                       obj["intelligenceModifier"] = getIntelligenceModifier(obj["intelligence"]);
                                       obj["techLevel"] = getMaxTechLevel(obj["intelligence"]);
                                       obj["addLanguages"] = fnAddLanguages(obj["intelligenceModifier"], obj["luckySign"], obj["luckModifier"]);
                                      obj["artifactCheckBonus"] = obj["intelligenceModifier"] + getMutant().artifactCheckBonus;}],
                  
                  ["The plantient’s Intelligence score increases by +4; gains additional +2 to Willpower saves.", 
                        function(obj) { obj["intelligence"] += 4; obj["will"] += 2;
                                       if(obj["intelligence"] > 24) obj["intelligence"] =24;  
                                       obj["intelligenceModifier"] = getIntelligenceModifier(obj["intelligence"]);
                                       obj["techLevel"] = getMaxTechLevel(obj["intelligence"]);
                                       obj["addLanguages"] = fnAddLanguages(obj["intelligenceModifier"], obj["luckySign"], obj["luckModifier"]);
                                      obj["artifactCheckBonus"] = obj["intelligenceModifier"] + getMutant().artifactCheckBonus;}]
              ],
              
              
              26: [
                  ["Failure, mutation results in a cosmetic change only: plantient appears to be a big-headed know-it-all.", null],
                  ["The plantient’s Intelligence score is increased by +1.",
                        function(obj) { obj["intelligence"] += 1;
                                       if(obj["intelligence"] > 24) obj["intelligence"] =24;  
                                       obj["intelligenceModifier"] = getIntelligenceModifier(obj["intelligence"]);
                                       obj["techLevel"] = getMaxTechLevel(obj["intelligence"]);
                                       obj["addLanguages"] = fnAddLanguages(obj["intelligenceModifier"], obj["luckySign"], obj["luckModifier"]);
                                      obj["artifactCheckBonus"] = obj["intelligenceModifier"] + getMutant().artifactCheckBonus;}],
                  
                  ["The plantient’s Intelligence score is increased by +2.",
                        function(obj) { obj["intelligence"] += 2;
                                       if(obj["intelligence"] > 24) obj["intelligence"] =24;  
                                       obj["intelligenceModifier"] = getIntelligenceModifier(obj["intelligence"]);
                                       obj["techLevel"] = getMaxTechLevel(obj["intelligence"]);
                                       obj["addLanguages"] = fnAddLanguages(obj["intelligenceModifier"], obj["luckySign"], obj["luckModifier"]);
                                      obj["artifactCheckBonus"] = obj["intelligenceModifier"] + getMutant().artifactCheckBonus;}],
                  
                  ["The plantient’s Intelligence score is increased by +3.",
                        function(obj) { obj["intelligence"] += 3;
                                       if(obj["intelligence"] > 24) obj["intelligence"] =24;  
                                       obj["intelligenceModifier"] = getIntelligenceModifier(obj["intelligence"]);
                                       obj["techLevel"] = getMaxTechLevel(obj["intelligence"]);
                                       obj["addLanguages"] = fnAddLanguages(obj["intelligenceModifier"], obj["luckySign"], obj["luckModifier"]);
                                      obj["artifactCheckBonus"] = obj["intelligenceModifier"] + getMutant().artifactCheckBonus;}],
                  
                  ["The plantient’s Intelligence score is increased by +4; Artifact checks succeed automatically up to tech level 2.",
                        function(obj) { obj["intelligence"] += 4;
                                       if(obj["intelligence"] > 24) obj["intelligence"] =24;  
                                       obj["intelligenceModifier"] = getIntelligenceModifier(obj["intelligence"]);
                                       obj["techLevel"] = getMaxTechLevel(obj["intelligence"]);
                                       if(obj["techLevel"] < 2) obj["techLevel"] =2;
                                       obj["techLevel"] = getMaxTechLevel(obj["intelligence"]);
                                       obj["addLanguages"] = fnAddLanguages(obj["intelligenceModifier"], obj["luckySign"], obj["luckModifier"]);
                                      obj["artifactCheckBonus"] = obj["intelligenceModifier"] + getMutant().artifactCheckBonus;}],
                  
                  ["The plantient’s Intelligence score is increased by +5; Artifact checks succeed automatically up to tech level 3.",
                        function(obj) { obj["intelligence"] += 5;
                                       if(obj["intelligence"] > 24) obj["intelligence"] =24;  
                                       obj["intelligenceModifier"] = getIntelligenceModifier(obj["intelligence"]);
                                       obj["techLevel"] = getMaxTechLevel(obj["intelligence"]);
                                       if(obj["techLevel"] < 3) obj["techLevel"] =3;
                                       obj["techLevel"] = getMaxTechLevel(obj["intelligence"]);
                                       obj["addLanguages"] = fnAddLanguages(obj["intelligenceModifier"], obj["luckySign"], obj["luckModifier"]);
                                      obj["artifactCheckBonus"] = obj["intelligenceModifier"] + getMutant().artifactCheckBonus;}],
                  
                  ["The plantient’s Intelligence score is increased by +6 (to a maximum of 24);  artifact checks succeed automatically up to tech level 4. ",
                        function(obj) { obj["intelligence"] += 6;
                                       if(obj["intelligence"] > 24) obj["intelligence"] =24;  
                                       obj["intelligenceModifier"] = getIntelligenceModifier(obj["intelligence"]);
                                       obj["techLevel"] = getMaxTechLevel(obj["intelligence"]);
                                       if(obj["techLevel"] < 4) obj["techLevel"] =4;
                                       obj["techLevel"] = getMaxTechLevel(obj["intelligence"]);
                                       obj["addLanguages"] = fnAddLanguages(obj["intelligenceModifier"], obj["luckySign"], obj["luckModifier"]);
                                      obj["artifactCheckBonus"] = obj["intelligenceModifier"] + getMutant().artifactCheckBonus;}]
              ]
                  
            
              };
              if(mentalMutation.id < 24){
                  effect = ["A mutation check roll each time the active mutation is used.", null];
              } else {
                /*  objTodo = passiveData[physicalMutation.id][Math.floor(Math.random() * passiveData[physicalMutation.id].length)];
                  effect = objTodo[0];
                  objTodo[1]();*/
                  
                 effect = passiveData[mentalMutation.id][Math.floor(Math.random() * passiveData[mentalMutation.id].length)];
                
                //effect = passiveData[26][Math.floor(Math.random() * passiveData[26].length)];
             }
          
              return effect;
          }
                  
           
      /*	  
getDefect() - returns a randomly generated Physical Mutation 
*/
function getDefect(){
    
    let mutationDefect = [
        //Active Defects 1-2
        {"id": 1, "defect": "Death Pretense"},
        {"id": 2, "defect": "Life Force Transference"},
        //Passive Defects 3-25
        {"id": 3, "defect": "Asymmetrical Body"},
        {"id": 4, "defect": "Atraction Ordor"},
        {"id": 5, "defect": "Body Part Loss"},
        {"id": 6, "defect": "Delayed Reaction"},
        {"id": 7, "defect": "Delusional"},
        {"id": 8, "defect": "Devolved"},
        {"id": 9, "defect": "Diminished Body Part"},
        {"id": 10, "defect": "Diminished Sense"},
        {"id": 11, "defect": "Diminished Stamina"},
        {"id": 12, "defect": "Enmity"},
        {"id": 13, "defect": "Enlarged Body Part"},
        {"id": 14, "defect": "Ipsilateral Body Plan"},
        {"id": 15, "defect": "Mental Block"},
        {"id": 16, "defect": "Mental Defenselessness"},
        {"id": 17, "defect": "Multiple Personalities"},
        {"id": 18, "defect": "Special Vulnerability"},
        {"id": 19, "defect": "Stumblebum"},
        {"id": 20, "defect": "Stunted Wings"},
        {"id": 21, "defect": "Thin Skin"},
        {"id": 22, "defect": "Uncontrolled Empathy"},
        {"id": 23, "defect": "Uncontrolled Telepathy"},
        {"id": 24, "defect": "Useless Body Parts"},
        {"id": 25, "defect": "Weak Willed"}
	];
    let arrResult = [];
    for(i = 0; i< 2; ){
        let newObj = mutationDefect[Math.floor(Math.random() * mutationDefect.length)];
        
        if(!JSON.stringify(arrResult).includes(JSON.stringify(newObj))){
            arrResult.push(newObj);
            i++;
        } 
    }
    return arrResult;
}
      
      
         
      /* getDefectType()
    */
      function getDefectType(mutationDefect){
          
          let type = "Passive";
          
          if(mutationDefect.id <= 2){
              type = "Active";
          }
          
          return type;
      }     
       
      
            
    /*getDefectEffect()
      */
      function getDefectEffect(mutationDefect){
          
          let effect = "";
          let passiveData = {
              3: [
                  ["The plantient’s body is greatly atrophied on one side: melee and missile attacks at -3, -10’ movement speed.",
                        function(obj) { obj["melee"] -= 3; obj["range"] -= 3; obj["speed"] -= 10; obj["modifiedSpeed"] -=10;}], 
                  
                  ["The plantient has one arm much larger than the other; +1 Strength, -2 Agility.",
                        function(obj) { obj["strength"] += 1; obj["agility"] -= 2;
                                       
                                       if(obj["strength"] > 24) obj["strength"] = 24;  
                                       obj["strengthModifier"] = getStrengthModifier(obj["strength"]);
                                       
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                       
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       
                                       obj["strengthModifier"] = getStrengthModifier(obj["strength"]);
                                       obj["melee"] = getMutant().attackBonus + obj["strengthModifier"] + meleeAdjust(obj["luckySign"], obj["luckModifier"]);
                                        obj["meleeDamageBonus"] = obj["strengthModifier"] + adjustMeleeDamage(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);
                                      }],
                  
                  ["The plantient has one leg much longer than the other; +5’ movement speed, -2 Agility.",
                        function(obj) { 
                                       obj["agility"] -= 2; obj["speed"] += 5; obj["modifiedSpeed"] +=5;
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                            
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                        
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient’s facial features are ever so slightly off-center; -1 AI recognition." , null]          
              ],
              
              4: [
                  ["The plantient’s fetid stench attracts carrion feeders; -3 Personality.",
                        function(obj) { obj["personality"] -= 3;
                                       if(obj["personality"] < 3) obj["personality"] = 3;  
                                       obj["personalityModifier"] = getPersonalityModifier(obj["personality"]);
                                       obj["will"] = getMutant().will + obj["personalityModifier"] + adjustWill(obj["luckySign"], obj["luckModifier"]);}],
                  ["The plantient’s rancid pungence causes rodents to seek out the plantient.", null],
                  ["The plantient’s redolent odor attracts biting insects, bees, and wasps", null],
                  ["The plantient’s musky fragrance causes non-sentient creatures to go into rut.", null],
                  ["The plantient slight air of feculence attracts flies wherever he goes." , null]           
              ],
              
              5: [
                  ["The plantient has no head; all features normally found on the head are located mid-abdomen; -3 Personality.",
                        function(obj) { obj["personality"] -= 3;
                                       if(obj["personality"] < 3) obj["personality"] = 3;  
                                       obj["personalityModifier"] = getPersonalityModifier(obj["personality"]);
                                       obj["will"] = getMutant().will + obj["personalityModifier"] + adjustWill(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient is missing one leg; -4 Agility, 1/2 normal movement.",
                        function(obj) { obj["agility"] -= 4; obj["speed"] -= 15; obj["modifiedSpeed"] -=15;
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient is missing one arm; -2 Agility.",
                        function(obj) { obj["agility"] -= 2;
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient is missing one eye and has no depth perception; -2 melee attacks, -3 missile attacks.",
                        function(obj) { obj["melee"] -= 2; obj["range"] -= 3;}],
                  
                  ["The plantient has no eyelids, and must sleep with eyes open or blindfolded; -1 Stamina.",
                        function(obj) { obj["stamina"] -= 1;
                                       if(obj["stamina"] < 3) obj["stamina"] = 3;  
                                       obj["staminaModifier"] = getStaminaModifier(obj["stamina"]);
                                       obj["fort"] = getMutant().fort + obj["staminaModifier"] + adjustFort(obj["luckySign"], obj["luckModifier"]);}]            
              ],
              
              6: [
                  ["The plantient’s deep-rooted dyslexia causes the plantient to automatically go last in combat initiative order.", null],
                  ["The plantient’s tendency to hem and haw results in -5 to initiative rolls.",
                        function(obj) { obj["init3"] -= 5;}],
                  
                  ["The plantient’s chronic over thinking results in -4 to combat initiative rolls",
                        function(obj) { obj["init3"] -= 4;}],
                  
                  ["The plantient’s habitual dawdling results in -3 to initiative rolls",
                        function(obj) { obj["init3"] -= 3;}],
                  
                  ["The plantient’s momentary pause results in -2 to initiative rolls.",
                        function(obj) { obj["init3"] -= 2;}]            
              ],
              
              7: [
                  ["The plantient’s hysterical blindness towards pure strain humans renders that genotype effectively invisible...", null],
                  ["The plantient’s hysterical blindness towards plantients renders that genotype effectively invisible...", null],
                  ["The plantient’s hysterical blindness towards plantients renders that genotype effectively invisible...", null]            
              ],
              
              
              8: [
                  ["The plantient physically resembles their source genotype;  plantient is mute and unable to handle tools...", null],
                  ["The plantient is barely able to handle tools with a -6 Agility.",
                        function(obj) { obj["agility"] -= 6;
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient physically resembles a slightly larger version of his or her source genotype; -4 Agility",
                        function(obj) { obj["agility"] -= 4;
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient physically resembles a tall, erect version of his or her source genotype; -2 Agility",
                        function(obj) { obj["agility"] -= 2;
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient is a slightly less evolved example of his or her genotype; -1 Intelligence.",
                        function(obj) { obj["intelligence"] -= 1;
                                       if(obj["intelligence"] < 3) obj["intelligence"] = 3;  
                                       obj["intelligenceModifier"] = getIntelligenceModifier(obj["intelligence"]);
                                       obj["techLevel"] = getMaxTechLevel(obj["intelligence"]);
                                       obj["addLanguages"] = fnAddLanguages(obj["intelligenceModifier"], obj["luckySign"], obj["luckModifier"]);
                                      obj["artifactCheckBonus"] = obj["intelligenceModifier"] + getMutant().artifactCheckBonus;}] 
              ],
              
              9: [
                  ["The plantient’s head is tiny and doll-like; -3 to all ranged attacks.",
                        function(obj) { obj["range"] -= 3;}],
                  
                  ["The plantient’s hands are over-small and childlike; -2 to melee and missile attacks.",
                        function(obj) { obj["melee"] -= 2; obj["range"] -= 2;}],
                  
                  ["The plantient’s feet are stunted and miniature; -2 Agility, -10’ movement speed.",
                        function(obj) { obj["agility"] -= 2; obj["speed"] -= 10; obj["modifiedSpeed"] -=10;
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient’s digestive track is reduced in size and function; -1 Stamina.",
                        function(obj) { obj["stamina"] -= 1;
                                       if(obj["stamina"] < 3) obj["stamina"] = 3;  
                                       obj["staminaModifier"] = getStaminaModifier(obj["stamina"]);
                                       obj["fort"] = getMutant().fort + obj["staminaModifier"] + adjustFort(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient’s heart is three sizes too small; the plantient hates all celebrations and holidays; -2 Personality.",
                        function(obj) { obj["personality"] -= 2;
                                       if(obj["personality"] < 3) obj["personality"] = 3;  
                                       obj["personalityModifier"] = getPersonalityModifier(obj["personality"]);
                                       obj["will"] = getMutant().will + obj["personalityModifier"] + adjustWill(obj["luckySign"], obj["luckModifier"]);}]            
              ],
              
              10: [
                  ["Mutant is extremely nearsighted with -4 to all ranged attacks",
                        function(obj) { obj["range"] -= 4;}],
                  
                  ["Mutant is quite farsighted with -4 to all melee attacks",
                        function(obj) { obj["melee"] -= 4;}],
                  
                 // "Mutant is colorblind with -4 to all Artifact checks",
                  
                  ["Mutant has motion blindness with -2 to all attacks.",
                        function(obj) { obj["melee"] -= 2; obj["range"] -= 2;}],
                  
                 // ["The plantient’s tactile sense is notably diminished; plantient suffers a -1 to melee attacks, and a -5 to all Artifact checks.",
                  
                  ["The plantient suffers from a complete lack of common sense; -2 Intelligence.",
                        function(obj) { obj["intelligence"] -= 2;
                                       if(obj["intelligence"] < 3) obj["intelligence"] = 3;  
                                       obj["intelligenceModifier"] = getIntelligenceModifier(obj["intelligence"]);
                                       obj["techLevel"] = getMaxTechLevel(obj["intelligence"]);
                                       obj["addLanguages"] = fnAddLanguages(obj["intelligenceModifier"], obj["luckySign"], obj["luckModifier"]);
                                      obj["artifactCheckBonus"] = obj["intelligenceModifier"] + getMutant().artifactCheckBonus;}]           
              ],
              
              11: [
                  ["The plantient’s Stamina score decreases by -4.",
                        function(obj) { obj["stamina"] -= 4;
                                       if(obj["stamina"] < 3) obj["stamina"] = 3;  
                                       obj["staminaModifier"] = getStaminaModifier(obj["stamina"]);
                                       obj["fort"] = getMutant().fort + obj["staminaModifier"] + adjustFort(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient’s Stamina score decreases by -5; plantient receives no saving throw versus damage from electrical attacks.",
                        function(obj) { obj["stamina"] -= 5;
                                       if(obj["stamina"] < 3) obj["stamina"] = 3;  
                                       obj["staminaModifier"] = getStaminaModifier(obj["stamina"]);
                                       obj["fort"] = getMutant().fort + obj["staminaModifier"] + adjustFort(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient’s Stamina score decreases by -6; plantient receives no saving throw versus damage from heat-based attacks.",
                        function(obj) { obj["stamina"] -= 6;
                                       if(obj["stamina"] < 3) obj["stamina"] = 3;  
                                       obj["staminaModifier"] = getStaminaModifier(obj["stamina"]);
                                       obj["fort"] = getMutant().fort + obj["staminaModifier"] + adjustFort(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient’s Stamina score decreases by -7;  plantient receives no saving throw versus damage from radiation-based attacks.",
                        function(obj) { obj["stamina"] -= 7;
                                       if(obj["stamina"] < 3) obj["stamina"] = 3;  
                                       obj["staminaModifier"] = getStaminaModifier(obj["stamina"]);
                                       obj["fort"] = getMutant().fort + obj["staminaModifier"] + adjustFort(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient’s Stamina score decreases by -3",
                        function(obj) { obj["stamina"] -= 3;
                                       if(obj["stamina"] < 3) obj["stamina"] = 3;  
                                       obj["staminaModifier"] = getStaminaModifier(obj["stamina"]);
                                       obj["fort"] = getMutant().fort + obj["staminaModifier"] + adjustFort(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient’s Stamina score decreases by -2.",
                        function(obj) { obj["stamina"] -= 2;
                                       if(obj["stamina"] < 3) obj["stamina"] = 3;  
                                       obj["staminaModifier"] = getStaminaModifier(obj["stamina"]);
                                       obj["fort"] = getMutant().fort + obj["staminaModifier"] + adjustFort(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient’s Stamina score decreases by -1.",
                        function(obj) { obj["stamina"] -= 1;
                                       if(obj["stamina"] < 3) obj["stamina"] = 3;  
                                       obj["staminaModifier"] = getStaminaModifier(obj["stamina"]);
                                       obj["fort"] = getMutant().fort + obj["staminaModifier"] + adjustFort(obj["luckySign"], obj["luckModifier"]);}]            
              ],
              
              12: [
                  ["Any non-sentient creature within range must make a Will save or attack the plantient upon first encountering them; -4 Personality.",
                        function(obj) { obj["personality"] -= 4;
                                       if(obj["personality"] < 3) obj["personality"] = 3;  
                                       obj["personalityModifier"] = getPersonalityModifier(obj["personality"]);
                                       obj["will"] = getMutant().will + obj["personalityModifier"] + adjustWill(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["Any carnivore within range must make a Will save or attack the plantient upon first encountering them; -2 Personality.",
                        function(obj) { obj["personality"] -= 2;
                                       if(obj["personality"] < 3) obj["personality"] = 3;  
                                       obj["personalityModifier"] = getPersonalityModifier(obj["personality"]);
                                       obj["will"] = getMutant().will + obj["personalityModifier"] + adjustWill(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["No one except plantient’s close friends and family can stand to be around him or her for more than 1 turn, making endless...", null]            
              ],
              
              13: [
                  ["The plantient’s head is humongous; -2 AC.",
                        function(obj) { obj["acBonus"] -= 2;}],
                  
                  ["The plantient’s hands are over-large and clumsy; -2 to melee and missile attacks.",
                        function(obj) { obj["melee"] -= 2; obj["range"] -= 2;}],
                  
                  ["The plantient’s feet are huge and ungainly; -2 Agility, +5’ movement.",
                        function(obj) { obj["agility"] -= 2; obj["speed"] += 5; obj["modifiedSpeed"] +=5;
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient’s heart is three sizes too large; plantient takes in and adopts all strays; +2 Personality.",
                        function(obj) { obj["personality"] += 2;
                                       if(obj["personality"] < 3) obj["personality"] = 3;  
                                       obj["personalityModifier"] = getPersonalityModifier(obj["personality"]);
                                       obj["will"] = getMutant().will + obj["personalityModifier"] + adjustWill(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient is very popular with members of the opposite sex.", null]            
              ],
              
              14: [
                  ["The plantient has one leg and one arm where the other should be; -4 Agility, -2 Strength.",
                        function(obj) { obj["agility"] -= 4; obj["strength"] -= 2;
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       
                                       if(obj["strength"] < 3) obj["strength"] = 3;  
                                       obj["strengthModifier"] = getStrengthModifier(obj["strength"]);
                                       obj["melee"] = getMutant().attackBonus + obj["strengthModifier"] + meleeAdjust(obj["luckySign"], obj["luckModifier"]);
                                        obj["meleeDamageBonus"] = obj["strengthModifier"] + adjustMeleeDamage(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient’s arms are all located on one side of the plantient’s body (roll 1d5: 1-2 right side, 3-5 left side); -3 Agility.",
                        function(obj) { obj["agility"] -= 3;
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient’s feet face in opposite directions, one forward and one facing backwards; -15’ movement",
                        function(obj) { obj["speed"] -= 15; obj["modifiedSpeed"] -=15;}],
                  
                  ["The plantients’ hands face in opposite directions (one up, the other down); - 2 Agility.",
                        function(obj) { obj["agility"] -= 2;
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient’s eyes appear only on one sides of the plantient’s face, limiting field of vision; -1 to all attacks.",
                        function(obj) { obj["melee"] -= 1; obj["range"] -= 1;}]            
              ],
              
              15: [
                  ["The plantient has a congenital mental block when it comes to using artifacts of the Ancient Ones; plantient may never willingly or....", null],
                  ["The plantient has a mental block about taking common sense approaches to problem solving, making the plantient a serial contrarian; plantient will...", null]            
              ],
              
              16: [
                  ["The plantient’s Personality score decreases by -4; no saving throw versus Domination or Mind Control mutation attacks. ",
                        function(obj) { obj["personality"] -= 4;
                                       if(obj["personality"] < 3) obj["personality"] = 3;  
                                       obj["personalityModifier"] = getPersonalityModifier(obj["personality"]);
                                       obj["will"] = getMutant().will + obj["personalityModifier"] + adjustWill(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient’s Personality score decreases by -3.",
                        function(obj) { obj["personality"] -= 3;
                                       if(obj["personality"] < 3) obj["personality"] = 3;  
                                       obj["personalityModifier"] = getPersonalityModifier(obj["personality"]);
                                       obj["will"] = getMutant().will + obj["personalityModifier"] + adjustWill(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient’s Personality score decreases by -2.",
                        function(obj) { obj["personality"] -= 2;
                                       if(obj["personality"] < 3) obj["personality"] = 3;  
                                       obj["personalityModifier"] = getPersonalityModifier(obj["personality"]);
                                       obj["will"] = getMutant().will + obj["personalityModifier"] + adjustWill(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient’s Personality score decreases by -1.",
                        function(obj) { obj["personality"] -= 1;
                                       if(obj["personality"] < 3) obj["personality"] = 3;  
                                       obj["personalityModifier"] = getPersonalityModifier(obj["personality"]);
                                       obj["will"] = getMutant().will + obj["personalityModifier"] + adjustWill(obj["luckySign"], obj["luckModifier"]);}]            
              ],
              
              17: [
                  ["The plantient has 10 different personalities; whenever the plantient rolls combat initiative, they must make a DC 18 Will...", null],
                  ["The plantient has 8 different personalities; whenever the plantient rolls combat initiative, they must make a DC 15 Will...", null],
                  ["The plantient has 6 different personalities; whenever the plantient rolls combat initiative, they must make a DC 12 Will...", null],
                  ["The plantient has 4 different personalities; whenever the plantient rolls combat initiative, they must make a DC 12 Will...", null],
                  ["The plantient has 2 different personalities; whenever the plantient rolls combat initiative, they must make a DC 8 Will...", null]           
              ],
              
              18: [
                  ["The plantient has a congenitally weak constitution, and takes 2x damage from all attacks.", null],
                  ["The plantient is narcoleptic; must make DC 10 Fortitude save to stay awake during watches or combat.", null]            
              ],
              
              19: [
                  ["The plantient’s Agility score is decreased by -5.",
                        function(obj) { obj["agility"] -= 5;
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient’s Agility score is decreased by -4.",
                        function(obj) { obj["agility"] -= 4;
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient’s Agility score is decreased by -3.",
                        function(obj) { obj["agility"] -= 3;
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient’s Agility score is decreased by -2.",
                        function(obj) { obj["agility"] -= 2;
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient’s Agility score is decreased by -1.",
                        function(obj) { obj["agility"] -= 1;
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}]            
              ],
              
              20: [
                  ["The plantient has two ill-balanced fleshy nubs growing out of plantient’s back; -2 Agility.",
                        function(obj) { obj["agility"] -= 2;
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient has tiny malformed wings that are as laughably non-functional as they are awkward; -1 Agility.",
                        function(obj) { obj["agility"] -= 1;
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient has non-functional flight feathers growing from forearms and calves.", null],
                  ["The plantient has non-functional membranes stretching from wrist to ankles.", null],
                  ["The plantient has smallish wings that act as a crude and ineffective parachute; plantient takes 1/2 damage from falling.", null]            
              ],
              
              21: [
                  ["The plantient takes 2x damage from physical attacks.", null],
                  ["The plantient takes 2x damage from mental mutation attacks.", null],
                  ["The plantient takes 2x damage from any EM-based attacks.", null],
                  ["The plantient’s skin is copper-based and water soluble; plantient takes 2 hp damage per round if exposed to or immersed in water.", null],
                  ["The plantient is so thin-skinned that they is unable to participate in any group activity unless constantly praised by their fellows.", null]            
              ],
              
              22: [
                  ["Other creatures within range note the plantient’s presence and motives even if otherwise hidden.", null],
                  ["Other creatures within range discern the plantient’s presence and motives with a DC 4 Willpower Save.", null],
                  ["Other sentients may detect plantient’s motives by making a DC 6 Willpower save.", null],
                  ["Other sentients may detect plantient’s motives by making a DC 8 Willpower save.", null],
                  ["Other sentients may detect plantient’s motives by making a DC 12 Willpower save.", null]            
              ],
              
              23: [
                  ["The plantient’s deep thoughts and intentions may be read by any sentient making a DC 12 Willpower save.", null],
                  ["The plantient’s surface thoughts and intentions may be read by any sentient making a DC 14 Willpower save", null],
                  ["The plantient’s passing thoughts may be read by any sentient making a DC 16 Willpower save.", null]            
              ],
              
              24: [
                  ["The plantient possesses a long clumsy tail that constantly throws the plantient off balance; -3 Agility.",
                        function(obj) { obj["agility"] -= 3;
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient possesses non-functional gills and vestigial fins on arms and legs; -2 Agility.",
                        function(obj) { obj["agility"] -= 2;
                                       if(obj["agility"] < 3) obj["agility"] = 3;  
                                       obj["agilityModifier"] = getAgilityModifier(obj["agility"]);
                                      obj["ref"] = getMutant().ref + obj["agilityModifier"] + adjustRef(obj["luckySign"], obj["luckModifier"]);
                                       obj["init2"] = getMutant().horrowDieBonus + obj["agilityModifier"] + adjustInit(obj["luckySign"], obj["luckModifier"]);
                                       obj["range"] = getMutant().attackBonus + obj["agilityModifier"] + rangeAdjust(obj["luckySign"], obj["luckModifier"]);}],
                  
                  ["The plantient has small knobs growing out of his or her forehead; -1 AI recognition.", null],
                  ["The plantient possesses a sixth finger on each hand which occasionally lights up and beeps", null] ,
                  ["The plantient has a thin membrane between ankles and wrists; plantient gains 5’ of gliding movement.", null]             
              ],
              
              25: [
                  //"Personality score is reduced to 5 and all Will saves are at a -2.",
                  ["The plantient has difficulty standing up to bullying, and must make a DC 8 Will save whenever he wishes to enter combat or win an argument.", null],
                  ["The plantient is so fixated on people-pleasing that he cannot refuse any request from friends or allies for help or assistance of any type.", null],
                  ["The plantient is a “yes man” and must at least appear to agree with everyone, even enemies.", null]            
              ]
                  
            
              };
              if(mutationDefect.id < 3){
                  effect = ["A mutation check roll each time the active mutation is used.", null];
              } else {
                /*  objTodo = passiveData[physicalMutation.id][Math.floor(Math.random() * passiveData[physicalMutation.id].length)];
                  effect = objTodo[0];
                  objTodo[1]();*/
                 
                 effect = passiveData[mutationDefect.id][Math.floor(Math.random() * passiveData[mutationDefect.id].length)];
              
                  //effect = passiveData[10][Math.floor(Math.random() * passiveData[10].length)];
             }

              return effect;
          }
                  

      
    /*getMutant() return the statistics for the Mutant per level*/  
    function getMutant() {
	let plantient = [
           
		{"level": 1,
		 "title": "Plantient, Sprout",
		 "actionDice": "1d20",
		 "attackBonus": 0,
		 "critDie": "1d10",
		 "critTable": "III",
         "critBonus": 0,
		 "hd": 1,
		 "ref": 1,
		 "fort": 0,
		 "will": 1,
		 "artifactCheckBonus": -1
        },
          
		{"level": 2,
		 "title": "Plantient, Caretaker",
		 "actionDice": "1d20",
		 "attackBonus": 1,
		 "critDie": "1d12",
		 "critTable": "III",
         "critBonus": 0,
		 "hd": 2,
		 "ref": 1,
		 "fort": 0,
		 "will": 1,
		 "artifactCheckBonus": 0
        },
          
		{"level": 3,
		 "title": "Plantient, Greenskeeper",
		 "actionDice": "1d20",
		 "attackBonus": 2,
		 "critDie": "1d14",
		 "critTable": "III",
         "critBonus": 0,
		 "hd":3,
		 "ref": 1,
		 "fort": 1,
		 "will": 2,
		 "artifactCheckBonus": 0
        },
          
		{"level": 4,
		 "title": "Plantient, Cultivator",
		 "actionDice": "1d20",
		 "attackBonus": 2,
		 "critDie": "1d16",
		 "critTable": "III",
         "critBonus": 0,
		 "hd": 4,
		 "ref": 2,
		 "fort": 1,
		 "will": 2,
		 "artifactCheckBonus": 1
        },
          
		{"level": 5,
		 "title": "Plantient, Warder",
		 "actionDice": "1d20+1d14",
		 "attackBonus": 3,
		 "critDie": "1d20",
		 "critTable": "III",
         "critBonus": 0,
		 "hd": 5,
		 "ref": 2,
		 "fort": 2,
		 "will": 3,
		 "artifactCheckBonus": 1
        },
          
		{"level": 6,
		 "title": "Plantient, High Warder",
		 "actionDice": "1d20+1d16",
		 "attackBonus": 4,
		 "critDie": "1d24",
		 "critTable": "III",
         "critBonus": 0,
		 "hd": 6,
		 "ref": 2,
		 "fort": 2,
		 "will": 3,
		 "artifactCheckBonus": 2
        },
          
		{"level": 7,
		 "title": "Plantient, High Warder",
		 "actionDice": "1d20(x2)",
		 "attackBonus": 5,
		 "critDie": "1d30",
         "critTable": "III",
         "critBonus": 0,
		 "hd": 7,
		 "ref": 3,
		 "fort": 3,
		 "will": 4,
		 "artifactCheckBonus": 3
        },
          
		{"level": 8,
		 "title": "Plantient, High Warder",
		 "actionDice": "1d20(x2)",
		 "attackBonus": 5,
		 "critDie": "1d30",
		 "critTable": "III",
         "critBonus": 2,
		 "hd": 8,
		 "ref": 3,
		 "fort": 3,
		 "will": 4,
		 "artifactCheckBonus": 4
        },
          
		{"level": 9,
		 "title": "Plantient, High Warder",
		 "actionDice": "1d20(x2)",
		 "attackBonus": 6,
		 "critDie": "1d30",
		 "critTable": "III",
         "critBonus": 4,
		 "hd": 9,
		 "ref": 3,
		 "fort": 3,
		 "will": 4,
		 "artifactCheckBonus": 5
        },
        
		{"level": 10,
		 "title": "Plantient, High Warder",
		 "actionDice": "1d20(x2)",
		 "attackBonus": 7,
		 "critDie": "1d30",
		 "critTable": "III",
         "critBonus": 6,
		 "hd": 10,
		 "ref": 4,
		 "fort": 4,
		 "will": 5,
		 "artifactCheckBonus": 6
        }
        
	];
	
	return plantient[7]; 

}



	  	  
	  
  
        let imgData = "images/plantient_character_sheet.png";
        $("#character_sheet").attr("src", imgData);

	  let data = Character();
		 
      //$("#name").html(data.name);  
      $("#profession").html(data.profession);
          
      $("#strength").html(data.strength);
      $("#strengthMod").html(addModifierSign(data.strengthModifier));
      
      $("#agility").html(data.agility);
      $("#agilityMod").html(addModifierSign(data.agilityModifier));
      
      $("#stamina").html(data.stamina);
      $("#staminaMod").html(addModifierSign(data.staminaModifier));
      
      $("#personality").html(data.personality);
      $("#personalityMod").html(addModifierSign(data.personalityModifier));
      
      $("#intelligence").html(data.intelligence);
      $("#intelligenceMod").html(addModifierSign(data.intelligenceModifier));
      
      $("#luck").html(data.luck);
      $("#luckMod").html(addModifierSign(data.luckModifier));
      
      
      $("#luckySign").html(data.luckySign);
      $("#luckyRoll").html(data.luckyRoll);
      $("#LuckySignBonus").html(addModifierSign(data.luckySignBonus));
      
		 
        let armourClass = 0;
        let baseAC = 10 + data.agilityModifier;
        
      if(data.acBonus === 19){
            armourClass = 19;
        }
        else {
          armourClass = baseAC + data.acBonus + data.acLuckySign;
        }
      
      $("#baseAC").html(armourClass);
      $("#modifiedArmourClass").html(<?php echo $armourBonusToArmourClass ?> + <?php echo $totalArtifactAC ?> + armourClass);
      
      $("#level").html(data.level);
      $("#title").html(data.title);
      
      $("#hitPoints").html(data.hitPoints);
      
      $("#ref").html(addModifierSign(data.ref));
      $("#fort").html(addModifierSign(data.fort));
      $("#will").html(addModifierSign(data.will));
      
      $("#init").html(addModifierSign(data.init));
      
      $("#melee").html(addModifierSign(data.melee));
      $("#range").html(addModifierSign(data.range));
      $("#meleeDamage").html(addModifierSign(data.meleeDamageBonus));
      $("#rangeDamage").html(addModifierSign(data.rangeDamageBonus));
      
      $("#fumbleDie").html(data.fumbleDie);
      $("#modifiedFumble").html(data.modifiedFumbleDie);
      $("#speed").html(data.speed + "'");
      $("#modifiedSpeed").html(data.modifiedSpeed + "'");
      
      $("#critDie").html(data.critDie);
      $("#critTable").html(data.critTable);
      
         let sResult = "";
            if (data.actionDice20 > 0){
                sResult += "1d20";
                if(data.actionDice20 > 1) {
                    sResult += "(x" + (data.actionDice20) +")";
                }
            }
            if (data.actionDice14 > 0){
                sResult += "+1d14";
                if(data.actionDice14 > 1) {
                    sResult += "(x" + (data.actionDice14) +")";
                }
            }
            if (data.actionDice16 > 0){
                sResult += "+1d16";
                if(data.actionDice16 > 1) {
                    sResult += "(x" + (data.actionDice16) +")";
                }
            }

      $("#actionDice").html(sResult);
      
      $("#artifactCheckBonus").html(addSign(data.artifactCheckBonus));
      $("#maxTech").html(data.techLevel);
      
      $("#mutantAppearance").html(data.appearance);
      $("#dieRollMethod").html(data.dieRollMethod);
      
      //dialectLanguage
      $("#languages").html(data.languages);
      $("#dialectLanguage").html(data.dialectTongue);
      $("#additionalLanguages").html(data.addLanguages);
      
      
      
      for(let n = 0; n < NUMBER_OF_PHYSICAL_MUTATIONS; n++){
          
          $("#physicalMutation" + n).html(data.bodyMutationDetails[n].bodyMutation);
          $("#physicalMutationType" + n).html(data.bodyMutationDetails[n].bodyMutationType);
          $("#physicalMutationManifest" + n).html(data.bodyMutationDetails[n].bodyMutationManifest);
          $("#physicalMutationEffect" +n).html(data.bodyMutationDetails[n].bodyMutationEffect[0]);

      }
      
      /*
      for(let p = 0; p < NUMBER_OF_MENTAL_MUTATIONS; p++){
          
          $("#mentalMutation" + p).html(data.mindMutationDetails[p].mindMutation);
          $("#mentalMutationType" + p).html(data.mindMutationDetails[p].mindMutationType);
          $("#mentalMutationManifest" + p).html(data.mindMutationDetails[p].mindMutationManifest);
          $("#mentalMutationEffect" +p).html(data.mindMutationDetails[p].mindMutationEffect[0]);

      }
      */
      
      for(let q = 0; q < NUMBER_OF_DEFECTS; q++){
          
          $("#defect" + q).html(data.defectMutationDetails[q].defectMutation);
          $("#defectType" + q).html(data.defectMutationDetails[q].defectMutationType);
          $("#defectEffect" + q).html(data.defectMutationDetails[q].defectMutationEffect[0]);
          
      }
      
      
      
      
	 
  </script>
		
	
    
</body>
</html>