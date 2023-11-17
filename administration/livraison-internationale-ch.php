<?php session_start();
require 'boutique0.php';


$FR=$_POST['FR']; $GP=$_POST['GP']; $GF=$_POST['GF']; $MQ=$_POST['MQ']; $YT=$_POST['YT']; $PF=$_POST['PF']; $RE=$_POST['RE']; $MF=$_POST['MF']; $PM=$_POST['PM']; $TF=$_POST['TF']; $AF=$_POST['AF']; $AXE=$_POST['AXE']; $AL=$_POST['AL']; $DZ=$_POST['DZ']; $ASS=$_POST['ASS']; $AD=$_POST['AD']; $AO=$_POST['AO']; $AI=$_POST['AI']; $AQ=$_POST['AQ']; $AG=$_POST['AG']; $AR=$_POST['AR']; $AW=$_POST['AW']; $AU=$_POST['AU']; $AT=$_POST['AT']; $AZ=$_POST['AZ'];
$BS=$_POST['BS']; $BH=$_POST['BH']; $BD=$_POST['BD']; $BB=$_POST['BB']; $BYY=$_POST['BYY']; $BE=$_POST['BE']; $BZ=$_POST['BZ']; $BJ=$_POST['BJ']; $BM=$_POST['BM']; $BT=$_POST['BT']; $BO=$_POST['BO']; $BQ=$_POST['BQ']; $BA=$_POST['BA']; $BW=$_POST['BW']; $BV=$_POST['BV']; $BR=$_POST['BR']; $IO=$_POST['IO']; $BN=$_POST['BN']; $BG=$_POST['BG']; $BF=$_POST['BF']; $BI=$_POST['BI']; $KH=$_POST['KH']; $CM=$_POST['CM']; $CA=$_POST['CA']; $CV=$_POST['CV'];
$KY=$_POST['KY']; $CF=$_POST['CF']; $TD=$_POST['TD']; $CL=$_POST['CL']; $CN=$_POST['CN'];  $CX=$_POST['CX']; $CC=$_POST['CC']; $CO=$_POST['CO']; $KM=$_POST['KM']; $CG=$_POST['CG']; $CD=$_POST['CD']; $CK=$_POST['CK']; $CR=$_POST['CR']; $CI=$_POST['CI']; $HR=$_POST['HR']; $CU=$_POST['CU']; $CW=$_POST['CW']; $CY=$_POST['CY']; $CZ=$_POST['CZ']; $NSP=$_POST['NSP']; $DJ=$_POST['DJ']; $DM=$_POST['DM'];  $DO=$_POST['DO']; $CE=$_POST['CE']; $EG=$_POST['EG'];
$SV=$_POST['SV']; $GQ=$_POST['GQ']; $ER=$_POST['ER']; $EE=$_POST['EE']; $ET=$_POST['ET']; $FK=$_POST['FK']; $FO=$_POST['FO']; $FJ=$_POST['FJ']; $FI=$_POST['FI']; $GM=$_POST['GM']; $GE=$_POST['GE']; $DE=$_POST['DE']; $GH=$_POST['GH']; $GI=$_POST['GI']; $GR=$_POST['GR']; $GL=$_POST['GL']; $GD=$_POST['GD']; $GU=$_POST['GU']; $GT=$_POST['GT']; $GG=$_POST['GG']; $GN=$_POST['GN']; $GW=$_POST['GW']; $GY=$_POST['GY']; $HT=$_POST['HT']; $HM=$_POST['HM'];
$VA=$_POST['VA']; $HN=$_POST['HN']; $HK=$_POST['HK']; $HU=$_POST['HU']; $ISS=$_POST['ISS']; $INN=$_POST['INN']; $IDD=$_POST['IDD']; $IR=$_POST['IR']; $IQ=$_POST['IQ']; $IE=$_POST['IE']; $IM=$_POST['IM']; $IL=$_POST['IL']; $IT=$_POST['IT']; $JM=$_POST['JM']; $JP=$_POST['JP']; $JE=$_POST['JE']; $JO=$_POST['JO']; $KZ=$_POST['KZ']; $KE=$_POST['KE']; $KI=$_POST['KI']; $KP=$_POST['KP']; $KR=$_POST['KR']; $KW=$_POST['KW']; $KG=$_POST['KG']; $LA=$_POST['LA']; 
$LV=$_POST['LV']; $LB=$_POST['LB']; $LS=$_POST['LS']; $LR=$_POST['LR']; $LY=$_POST['LY']; $LI=$_POST['LI']; $LT=$_POST['LT']; $LU=$_POST['LU']; $MO=$_POST['MO']; $MK=$_POST['MK']; $MG=$_POST['MG']; $MW=$_POST['MW']; $MY=$_POST['MY']; $MV=$_POST['MV']; $ML=$_POST['ML']; $MT=$_POST['MT']; $MH=$_POST['MH']; $MR=$_POST['MR']; $MU=$_POST['MU']; $MX=$_POST['MX']; $FM=$_POST['FM']; $MD=$_POST['MD']; $MC=$_POST['MC']; $MN=$_POST['MN']; $MS=$_POST['MS'];
$MA=$_POST['MA']; $MZ=$_POST['MZ']; $MM=$_POST['MM']; $NA=$_POST['NA']; $NR=$_POST['NR']; $NP=$_POST['NP']; $NL=$_POST['NL']; $NC=$_POST['NC']; $NZ=$_POST['NZ']; $NI=$_POST['NI']; $NE=$_POST['NE']; $NG=$_POST['NG']; $NU=$_POST['NU']; $NF=$_POST['NF']; $MP=$_POST['MP']; $NO=$_POST['NO']; $OM=$_POST['OM']; $PK=$_POST['PK']; $PW=$_POST['PW']; $PS=$_POST['PS']; $PA=$_POST['PA']; $PG=$_POST['PG']; $PY=$_POST['PY']; $PE=$_POST['PE']; $PH=$_POST['PH'];
$PN=$_POST['PN']; $PL=$_POST['PL']; $PT=$_POST['PT']; $PR=$_POST['PR']; $QA=$_POST['QA']; $RO=$_POST['RO']; $RU=$_POST['RU']; $RW=$_POST['RW']; $BL=$_POST['BL']; $SH=$_POST['SH']; $KN=$_POST['KN']; $LC=$_POST['LC']; $VC=$_POST['VC']; $WS=$_POST['WS']; $MF=$_POST['MF']; $ST=$_POST['ST']; $SA=$_POST['SA']; $SN=$_POST['SN']; $RS=$_POST['RS']; $SC=$_POST['SC']; $SL=$_POST['SL']; $SG=$_POST['SG']; $SX=$_POST['SX']; $SK=$_POST['SK']; $SI=$_POST['SI'];
$SB=$_POST['SB']; $SO=$_POST['SO']; $ZA=$_POST['ZA']; $GS=$_POST['GS']; $SS=$_POST['SS']; $ES=$_POST['ES']; $LK=$_POST['LK']; $SD=$_POST['SD']; $SR=$_POST['SR']; $SJ=$_POST['SJ']; $SZ=$_POST['SZ']; $SE=$_POST['SE']; $CH=$_POST['CH']; $SY=$_POST['SY']; $TW=$_POST['TW']; $TJ=$_POST['TJ']; $TZ=$_POST['TZ']; $TH=$_POST['TH']; $TL=$_POST['TL']; $TG=$_POST['TG']; $TK=$_POST['TK']; $TOO=$_POST['TOO']; $TT=$_POST['TT']; $TN=$_POST['TN']; $TR=$_POST['TR'];
$TM=$_POST['TM']; $TC=$_POST['TC']; $TV=$_POST['TV']; $UG=$_POST['UG']; $UA=$_POST['UA']; $AE=$_POST['AE']; $GB=$_POST['GB']; $US=$_POST['US']; $UM=$_POST['UM']; $UY=$_POST['UY']; $UZ=$_POST['UZ']; $VU=$_POST['VU']; $VE=$_POST['VE']; $VN=$_POST['VN']; $VG=$_POST['VG']; $VI=$_POST['VI']; $WF=$_POST['WF']; $EH=$_POST['EH']; $YE=$_POST['YE']; $ZM=$_POST['ZM']; $ZW=$_POST['ZW'];
//1-ASS=AS=Samoa américaines-------2-BYY=BY=Biélorussie---------5-ISS=IS=islande----INN=IN=Inde----IDD=ID=Indonésie--------9-TOO=TO=Tonga
$req0=$bdd->query('SELECT* FROM pays10');
$exist=$req0->rowCount();
if ($exist>0){

$req=$bdd->prepare('UPDATE pays1 SET FR=:FR, GP=:GP, GF=:GF, MQ=:MQ, YT=:YT, PF=:PF, RE=:RE, MF=:MF, PM=:PM, TF=:TF, AF=:AF, AXE=:AXE, AL=:AL, DZ=:DZ, ASS=:ASS, AD=:AD, AO=:AO, AI=:AI, AQ=:AQ, AG=:AG, AR=:AR, AW=:AW, AU=:AU, AT=:AT, AZ=:AZ');
$req->execute(array('FR'=>$FR, 'GP'=>$GP, 'GF'=>$GF, 'MQ'=>$MQ, 'YT'=>$YT, 'PF'=>$PF, 'RE'=>$RE, 'MF'=>$MF, 'PM'=>$PM, 'TF'=>$TF, 'AF'=>$AF, 'AXE'=>$AXE, 'AL'=>$AL, 'DZ'=>$DZ, 'ASS'=>$ASS, 'AD'=>$AD, 'AO'=>$AO, 'AI'=>$AI, 'AQ'=>$AQ, 'AG'=>$AG, 'AR'=>$AR, 'AW'=>$AW, 'AU'=>$AU, 'AT'=>$AT, 'AZ'=>$AZ));//ASS=AS=Samoa américaines

$req2=$bdd->prepare('UPDATE pays2 SET BS=:BS, BH=:BH, BD=:BD, BB=:BB, BYY=:BYY, BE=:BE, BZ=:BZ, BJ=:BJ, BM=:BM, BT=:BT, BO=:BO, BQ=:BQ, BA=:BA, BW=:BW, BV=:BV, BR=:BR, IO=:IO, BN=:BN, BG=:BG, BF=:BF, BI=:BI, KH=:KH, CM=:CM, CA=:CA, CV=:CV');
$req2->execute(array('BS'=>$BS, 'BH'=>$BH, 'BD'=>$BD, 'BB'=>$BB, 'BYY'=>$BYY, 'BE'=>$BE, 'BZ'=>$BZ, 'BJ'=>$BJ, 'BM'=>$BM, 'BT'=>$BT, 'BO'=>$BO, 'BQ'=>$BQ, 'BA'=>$BA, 'BW'=>$BW, 'BV'=>$BV, 'BR'=>$BR, 'IO'=>$IO, 'BN'=>$BN, 'BG'=>$BG, 'BF'=>$BF, 'BI'=>$BI, 'KH'=>$KH, 'CM'=>$CM, 'CA'=>$CA, 'CV'=>$CV));//BYY=BY=Biélorussie

$req3=$bdd->prepare('UPDATE pays3 SET KY=:KY, CF=:CF, TD=:TD, CL=:CL, CN=:CN, CX=:CX, CC=:CC, CO=:CO, KM=:KM, CG=:CG, CD=:CD, CK=:CK, CR=:CR, CI=:CI, HR=:HR, CU=:CU, CW=:CW, CY=:CY, CZ=:CZ, NSP=:NSP, DJ=:DJ, DM=:DM, DO=:DO, CE=:CE, EG=:EG');
$req3->execute(array('KY'=>$KY, 'CF'=>$CF, 'TD'=>$TD, 'CL'=>$CL, 'CN'=>$CN, 'CX'=>$CX, 'CC'=>$CC, 'CO'=>$CO, 'KM'=>$KM, 'CG'=>$CG, 'CD'=>$CD, 'CK'=>$CK, 'CR'=>$CR, 'CI'=>$CI, 'HR'=>$HR, 'CU'=>$CU, 'CW'=>$CW, 'CY'=>$CY, 'CZ'=>$CZ, 'NSP'=>$NSP, 'DJ'=>$DJ, 'DM'=>$DM, 'DO'=>$DO, 'CE'=>$CE, 'EG'=>$EG));

$req4=$bdd->prepare('UPDATE pays4 SET SV=:SV, GQ=:GQ, ER=:ER, EE=:EE, ET=:ET, FK=:FK, FO=:FO, FJ=:FJ, FI=:FI, GM=:GM, GE=:GE, DE=:DE, GH=:GH, GI=:GI, GR=:GR, GL=:GL, GD=:GD, GU=:GU, GT=:GT, GG=:GG, GN=:GN, GW=:GW, GY=:GY, HT=:HT, HM=:HM');
$req4->execute(array('SV'=>$SV, 'GQ'=>$GQ, 'ER'=>$ER, 'EE'=>$EE, 'ET'=>$ET, 'FK'=>$FK, 'FO'=>$FO, 'FJ'=>$FJ, 'FI'=>$FI, 'GM'=>$GM, 'GE'=>$GE, 'DE'=>$DE, 'GH'=>$GH, 'GI'=>$GI, 'GR'=>$GR, 'GL'=>$GL, 'GD'=>$GD, 'GU'=>$GU, 'GT'=>$GT, 'GG'=>$GG, 'GN'=>$GN, 'GW'=>$GW, 'GY'=>$GY, 'HT'=>$HT, 'HM'=>$HM));

$req5=$bdd->prepare('UPDATE pays5 SET VA=:VA, HN=:HN, HK=:HK, HU=:HU, ISS=:ISS, INN=:INN, IDD=:IDD, IR=:IR, IQ=:IQ, IE=:IE, IM=:IM, IL=:IL, IT=:IT, JM=:JM, JP=:JP, JE=:JE, JO=:JO, KZ=:KZ, KE=:KE, KI=:KI, KP=:KP, KR=:KR, KW=:KW, KG=:KG, LA=:LA');
$req5->execute(array('VA'=>$VA, 'HN'=>$HN, 'HK'=>$HK, 'HU'=>$HU, 'ISS'=>$ISS, 'INN'=>$INN, 'IDD'=>$IDD, 'IR'=>$IR, 'IQ'=>$IQ, 'IE'=>$IE, 'IM'=>$IM, 'IL'=>$IL, 'IT'=>$IT, 'JM'=>$JM, 'JP'=>$JP, 'JE'=>$JE, 'JO'=>$JO, 'KZ'=>$KZ, 'KE'=>$KE, 'KI'=>$KI, 'KP'=>$KP, 'KR'=>$KR, 'KW'=>$KW, 'KG'=>$KG, 'LA'=>$LA));//ISS=IS=islande----INN=IN=Inde----IDD=ID=Indonésie

$req6=$bdd->prepare('UPDATE pays6 SET LV=:LV, LB=:LB, LS=:LS, LR=:LR, LY=:LY, LI=:LI, LT=:LT, LU=:LU, MO=:MO, MK=:MK, MG=:MG, MW=:MW, MY=:MY, MV=:MV, ML=:ML, MT=:MT, MH=:MH, MR=:MR, MU=:MU, MX=:MX, FM=:FM, MD=:MD, MC=:MC, MN=:MN, MS=:MS');
$req6->execute(array('LV'=>$LV, 'LB'=>$LB, 'LS'=>$LS, 'LR'=>$LR, 'LY'=>$LY, 'LI'=>$LI, 'LT'=>$LT, 'LU'=>$LU, 'MO'=>$MO, 'MK'=>$MK, 'MG'=>$MG, 'MW'=>$MW, 'MY'=>$MY, 'MV'=>$MV, 'ML'=>$ML, 'MT'=>$MT, 'MH'=>$MH, 'MR'=>$MR, 'MU'=>$MU, 'MX'=>$MX, 'FM'=>$FM, 'MD'=>$MD, 'MC'=>$MC, 'MN'=>$MN, 'MS'=>$MS));

$req7=$bdd->prepare('UPDATE pays7 SET MA=:MA, MZ=:MZ, MM=:MM, NA=:NA, NR=:NR, NP=:NP, NL=:NL, NC=:NC, NZ=:NZ, NI=:NI, NE=:NE, NG=:NG, NU=:NU, NF=:NF, MP=:MP, NO=:NO, OM=:OM, PK=:PK, PW=:PW, PS=:PS, PA=:PA, PG=:PG, PY=:PY, PE=:PE, PH=:PH');
$req7->execute(array('MA'=>$MA, 'MZ'=>$MZ, 'MM'=>$MM, 'NA'=>$NA, 'NR'=>$NR, 'NP'=>$NP, 'NL'=>$NL, 'NC'=>$NC, 'NZ'=>$NZ, 'NI'=>$NI, 'NE'=>$NE, 'NG'=>$NG, 'NU'=>$NU, 'NF'=>$NF, 'MP'=>$MP, 'NO'=>$NO, 'OM'=>$OM, 'PK'=>$PK, 'PW'=>$PW, 'PS'=>$PS, 'PA'=>$PA, 'PG'=>$PG, 'PY'=>$PY, 'PE'=>$PE, 'PH'=>$PH));

$req8=$bdd->prepare('UPDATE pays8 SET PN=:PN, PL=:PL, PT=:PT, PR=:PR, QA=:QA, RO=:RO, RU=:RU, RW=:RW, BL=:BL, SH=:SH, KN=:KN, LC=:LC, VC=:VC, WS=:WS, ST=:ST, SA=:SA, SN=:SN, RS=:RS, SC=:SC, SL=:SL, SG=:SG, SX=:SX, SK=:SK, SI=:SI');
$req8->execute(array('PN'=>$PN, 'PL'=>$PL, 'PT'=>$PT, 'PR'=>$PR, 'QA'=>$QA, 'RO'=>$RO, 'RU'=>$RU, 'RW'=>$RW, 'BL'=>$BL, 'SH'=>$SH, 'KN'=>$KN, 'LC'=>$LC, 'VC'=>$VC, 'WS'=>$WS, 'ST'=>$ST, 'SA'=>$SA, 'SN'=>$SN, 'RS'=>$RS, 'SC'=>$SC, 'SL'=>$SL, 'SG'=>$SG, 'SX'=>$SX, 'SK'=>$SK, 'SI'=>$SI));

$req9=$bdd->prepare('UPDATE pays9 SET SB=:SB, SO=:SO, ZA=:ZA, GS=:GS, SS=:SS, ES=:ES, LK=:LK, SD=:SD, SR=:SR, SJ=:SJ, SZ=:SZ, SE=:SE, CH=:CH, SY=:SY, TW=:TW, TJ=:TJ, TZ=:TZ, TH=:TH, TL=:TL, TG=:TG, TK=:TK, TOO=:TOO, TT=:TT, TN=:TN, TR=:TR');
$req9->execute(array('SB'=>$SB, 'SO'=>$SO, 'ZA'=>$ZA, 'GS'=>$GS, 'SS'=>$SS, 'ES'=>$ES, 'LK'=>$LK, 'SD'=>$SD, 'SR'=>$SR, 'SJ'=>$SJ, 'SZ'=>$SZ, 'SE'=>$SE, 'CH'=>$CH, 'SY'=>$SY, 'TW'=>$TW, 'TJ'=>$TJ, 'TZ'=>$TZ, 'TH'=>$TH, 'TL'=>$TL, 'TG'=>$TG, 'TK'=>$TK, 'TOO'=>$TOO, 'TT'=>$TT, 'TN'=>$TN, 'TR'=>$TR));//TOO=TO=Tonga

$req10=$bdd->prepare('UPDATE pays10 SET TM=:TM, TC=:TC, TV=:TV, UG=:UG, UA=:UA, AE=:AE, GB=:GB, US=:US, UM=:UM, UY=:UY, UZ=:UZ, VU=:VU, VE=:VE, VN=:VN, VG=:VG, VI=:VI, WF=:WF, EH=:EH, YE=:YE, ZM=:ZM, ZW=:ZW');
$req10->execute(array('TM'=>$TM, 'TC'=>$TC, 'TV'=>$TV, 'UG'=>$UG, 'UA'=>$UA, 'AE'=>$AE, 'GB'=>$GB, 'US'=>$US, 'UM'=>$UM, 'UY'=>$UY, 'UZ'=>$UZ, 'VU'=>$VU, 'VE'=>$VE, 'VN'=>$VN, 'VG'=>$VG, 'VI'=>$VI, 'WF'=>$WF, 'EH'=>$EH, 'YE'=>$YE, 'ZM'=>$ZM, 'ZW'=>$ZW));

} else {


$req=$bdd->prepare('INSERT INTO pays1 (FR, GP, GF, MQ, YT, PF, RE, MF, PM, TF, AF, AXE, AL, DZ, ASS, AD, AO, AI, AQ, AG, AR, AW, AU, AT, AZ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
$req->execute(array($FR, $GP, $GF, $MQ, $YT, $PF, $RE, $MF, $PM, $TF, $AF, $AXE, $AL, $DZ, $ASS, $AD, $AO, $AI, $AQ, $AG, $AR, $AW, $AU, $AT, $AZ));//ASS=AS=Samoa américaines

$req2=$bdd->prepare('INSERT INTO pays2 (BS, BH, BD, BB, BYY, BE, BZ, BJ, BM, BT, BO, BQ, BA, BW, BV, BR, IO, BN, BG, BF, BI, KH, CM, CA, CV) VALUES(:BS, :BH, :BD, :BB, :BYY, :BE, :BZ, :BJ, :BM, :BT, :BO, :BQ, :BA, :BW, :BV, :BR, :IO, :BN, :BG, :BF, :BI, :KH, :CM, :CA, :CV)');
$req2->execute(array('BS'=>$BS, 'BH'=>$BH, 'BD'=>$BD, 'BB'=>$BB, 'BYY'=>$BYY, 'BE'=>$BE, 'BZ'=>$BZ, 'BJ'=>$BJ, 'BM'=>$BM, 'BT'=>$BT, 'BO'=>$BO, 'BQ'=>$BQ, 'BA'=>$BA, 'BW'=>$BW, 'BV'=>$BV, 'BR'=>$BR, 'IO'=>$IO, 'BN'=>$BN, 'BG'=>$BG, 'BF'=>$BF, 'BI'=>$BI, 'KH'=>$KH, 'CM'=>$CM, 'CA'=>$CA, 'CV'=>$CV));//BYY BY

$KY=$raz; $CF=$raz; $TD=$raz; $CL=$raz; $CN=$raz; $CX=$raz; $CC=$raz; $CO=$raz; $KM=$raz; $CG=$raz; $CD=$raz; $CK=$raz; $CR=$raz; $CI=$raz; $HR=$raz; $CU=$raz; $CW=$raz; $CY=$raz; $CZ=$raz; $NSP=$raz; $DJ=$raz; $DM=$raz;  $DO=$raz; $CE=$raz; $EG=$raz;
$req3=$bdd->prepare('INSERT INTO pays3 (KY, CF, TD, CL, CN, CX, CC, CO, KM, CG, CD, CK, CR, CI, HR, CU, CW, CY, CZ, NSP, DJ, DM, DO, CE, EG) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
$req3->execute(array($KY, $CF, $TD, $CL, $CN, $CX, $CC, $CO, $KM, $CG, $CD, $CK, $CR, $CI, $HR, $CU, $CW, $CY, $CZ, $NSP, $DJ, $DM, $DO, $CE, $EG));

$req4=$bdd->prepare('INSERT INTO pays4 (SV, GQ, ER, EE, ET, FK, FO, FJ, FI, GM, GE, DE, GH, GI, GR, GL, GD, GU, GT, GG, GN, GW, GY, HT, HM) VALUES(:SV, :GQ, :ER, :EE, :ET, :FK, :FO, :FJ, :FI, :GM, :GE, :DE, :GH, :GI, :GR, :GL, :GD, :GU, :GT, :GG, :GN, :GW, :GY, :HT, :HM)');
$req4->execute(array('SV'=>$SV, 'GQ'=>$GQ, 'ER'=>$ER, 'EE'=>$EE, 'ET'=>$ET, 'FK'=>$FK, 'FO'=>$FO, 'FJ'=>$FJ, 'FI'=>$FI, 'GM'=>$GM, 'GE'=>$GE, 'DE'=>$DE, 'GH'=>$GH, 'GI'=>$GI, 'GR'=>$GR, 'GL'=>$GL, 'GD'=>$GD, 'GU'=>$GU, 'GT'=>$GT, 'GG'=>$GG, 'GN'=>$GN, 'GW'=>$GW, 'GY'=>$GY, 'HT'=>$HT, 'HM'=>$HM));

$req5=$bdd->prepare('INSERT INTO pays5 (VA, HN, HK, HU, ISS, INN, IDD, IR, IQ, IE, IM, IL, IT, JM, JP, JE, JO, KZ, KE, KI, KP, KR, KW, KG, LA) VALUES(:VA, :HN, :HK, :HU, :ISS, :INN, :IDD, :IR, :IQ, :IE, :IM, :IL, :IT, :JM, :JP, :JE, :JO, :KZ, :KE, :KI, :KP, :KR, :KW, :KG, :LA)');
$req5->execute(array('VA'=>$VA, 'HN'=>$HN, 'HK'=>$HK, 'HU'=>$HU, 'ISS'=>$ISS, 'INN'=>$INN, 'IDD'=>$IDD, 'IR'=>$IR, 'IQ'=>$IQ, 'IE'=>$IE, 'IM'=>$IM, 'IL'=>$IL, 'IT'=>$IT, 'JM'=>$JM, 'JP'=>$JP, 'JE'=>$JE, 'JO'=>$JO, 'KZ'=>$KZ, 'KE'=>$KE, 'KI'=>$KI, 'KP'=>$KP, 'KR'=>$KR, 'KW'=>$KW, 'KG'=>$KG, 'LA'=>$LA));//ISS=IS=islande----INN=IN=Inde----IDD=ID=Indonésie

$req6=$bdd->prepare('INSERT INTO pays6 (LV, LB, LS, LR, LY, LI, LT, LU, MO, MK, MG, MW, MY, MV, ML, MT, MH, MR, MU, MX, FM, MD, MC, MN, MS) VALUES(:LV, :LB, :LS, :LR, :LY, :LI, :LT, :LU, :MO, :MK, :MG, :MW, :MY, :MV, :ML, :MT, :MH, :MR, :MU, :MX, :FM, :MD, :MC, :MN, :MS)');
$req6->execute(array('LV'=>$LV, 'LB'=>$LB, 'LS'=>$LS, 'LR'=>$LR, 'LY'=>$LY, 'LI'=>$LI, 'LT'=>$LT, 'LU'=>$LU, 'MO'=>$MO, 'MK'=>$MK, 'MG'=>$MG, 'MW'=>$MW, 'MY'=>$MY, 'MV'=>$MV, 'ML'=>$ML, 'MT'=>$MT, 'MH'=>$MH, 'MR'=>$MR, 'MU'=>$MU, 'MX'=>$MX, 'FM'=>$FM, 'MD'=>$MD, 'MC'=>$MC, 'MN'=>$MN, 'MS'=>$MS));

$req7=$bdd->prepare('INSERT INTO pays7 (MA, MZ, MM, NA, NR, NP, NL, NC, NZ, NI, NE, NG, NU, NF, MP, NO, OM, PK, PW, PS, PA, PG, PY, PE, PH) VALUES(:MA, :MZ, :MM, :NA, :NR, :NP, :NL, :NC, :NZ, :NI, :NE, :NG, :NU, :NF, :MP, :NO, :OM, :PK, :PW, :PS, :PA, :PG, :PY, :PE, :PH)');
$req7->execute(array('MA'=>$MA, 'MZ'=>$MZ, 'MM'=>$MM, 'NA'=>$NA, 'NR'=>$NR, 'NP'=>$NP, 'NL'=>$NL, 'NC'=>$NC, 'NZ'=>$NZ, 'NI'=>$NI, 'NE'=>$NE, 'NG'=>$NG, 'NU'=>$NU, 'NF'=>$NF, 'MP'=>$MP, 'NO'=>$NO, 'OM'=>$OM, 'PK'=>$PK, 'PW'=>$PW, 'PS'=>$PS, 'PA'=>$PA, 'PG'=>$PG, 'PY'=>$PY, 'PE'=>$PE, 'PH'=>$PH));

$req8=$bdd->prepare('INSERT INTO pays8 (PN, PL, PT, PR, QA, RO, RU, RW, BL, SH, KN, LC, VC, WS, ST, SA, SN, RS, SC, SL, SG, SX, SK, SI) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
$req8->execute(array($PN, $PL, $PT, $PR, $QA, $RO, $RU, $RW, $BL, $SH, $KN, $LC, $VC, $WS, $ST, $SA, $SN, $RS, $SC, $SL, $SG, $SX, $SK, $SI));

$req9=$bdd->prepare('INSERT INTO pays9 (SB, SO, ZA, GS, SS, ES, LK, SD, SR, SJ, SZ, SE, CH, SY, TW, TJ, TZ, TH, TL, TG, TK, TOO, TT, TN, TR) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
$req9->execute(array($SB, $SO, $ZA, $GS, $SS, $ES, $LK, $SD, $SR, $SJ, $SZ, $SE, $CH, $SY, $TW, $TJ, $TZ, $TH, $TL, $TG, $TK, $TOO, $TT, $TN, $TR));//TOO=TO=Tonga

$req10=$bdd->prepare('INSERT INTO pays10 (TM, TC, TV, UG, UA, AE, GB, US, UM, UY, UZ, VU, VE, VN, VG, VI, WF, EH, YE, ZM, ZW) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
$req10->execute(array($TM, $TC, $TV, $UG, $UA, $AE, $GB, $US, $UM, $UY, $UZ, $VU, $VE, $VN, $VG, $VI, $WF, $EH, $YE, $ZM, $ZW));

}
/*$FR=$raz; $GP=$raz; $GF=$raz, $MQ=$raz; $YT=$raz; $PF=$raz; $RE=$raz; $MF=$raz; $PM=$raz; $TF=$raz; $AF=$raz; $AXE=$raz; $AL=$raz; $DZ; $ASS; $AD; $AO; $AI; $AQ; $AG; $AR; $AW; $AU; $AT; $AZ;
$BS; $BH; $BD; $BB; $BYY; $BE; $BZ; $BJ; $BM; $BT; $BO; $BQ; $BA; $BW; $BV; $BR; $IO; $BN; $BG; $BF; $BI; $KH; $CM; $CA; $CV;
$KY; $CF; $TD; $CL; $CN;  $CX; $CC; $CO; $KM; $CG; $CD; $CK; $CR; $CI; $HR; $CU; $CW; $CY; $CZ; $NSP; $DJ; $DM;  $DO; $CE; $EG;
$SV; $GQ; $ER; $EE; $ET; $FK; $FO; $FJ; $FI; $GM; $GE; $DE; $GH; $GI; $GR; $GL; $GD; $GU; $GT; $GG; $GN; $GW; $GY; $HT; $HM;
$VA; $HN; $HK; $HU; $ISS; $INN; $IDD; $IR; $IQ; $IE; $IM; $IL; $IT; $JM; $JP; $JE; $JO; $KZ; $KE; $KI; $KP; $KR; $KW; $KG; $LA; 
$LV; $LB; $LS; $LR; $LY; $LI; $LT; $LU; $MO; $MK; $MG; $MW; $MY; $MV; $ML; $MT; $MH; $MR; $MU; $MX; $FM; $MD; $MC; $MN; $MS;
$MA; $MZ; $MM; $NA; $NR; $NP; $NL; $NC; $NZ; $NI; $NE; $NG; $NU; $NF; $MP; $NO; $OM; $PK; $PW; $PS; $PA; $PG; $PY; $PE; $PH;
$PN; $PL; $PT; $PR; $QA; $RO; $RU; $RW; $BL; $SH; $KN; $LC; $VC; $WS; $MF; $ST; $SA; $SN; $RS; $SC; $SL; $SG; $SX; $SK; $SI;
$SB; $SO; $ZA; $GS; $SS; $ES; $LK; $SD; $SR; $SJ; $SZ; $SE; $CH; $SY; $TW; $TJ; $TZ; $TH; $TL; $TG; $TK; $TO; $TT; $TN; $TR;
$TM; $TC; $TV; $UG; $UA; $AE; $GB; $US; $UM; $UY; $UZ; $VU; $VE; $VN; $VG; $VI; $WF; $EH; $YE; $ZM; $ZW;
*/
$_SESSION['message']="Tarifs Livraison internationale mémorisés";
header("Location:livraison-internationale.php");