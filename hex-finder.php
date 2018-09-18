<!DOCTYPE html>
<!--
Patrick Bradshaw 2018, probably.
-->
<html>
    <head>
        <link href="../_assets/css/tachyons.css" rel="stylesheet" type="text/css"/>
        <link href="../_assets/css/fontawesome-all.css" rel="stylesheet" type="text/css"/>
        <link href="../_assets/css/animate.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <title>易</title>
    </head>
    <body class='sans-serif pa4 center mw6 '>
        <form method="post" action="cast.php">
            <select id='slctHex' name='slctHex'>
                <option value="1">1. Ch'ien / The Creative</option>
                <option value="2">2. K'un / The Receptive</option>
                <option value="3">3. Chun / Difficulty at the Beginning</option>
                <option value="4">4. Mêng / Youthful Folly</option>
                <option value="5">5. Hsü / Waiting (Nourishment)</option>
                <option value="6">6. Sung / Conflict</option>
                <option value="7">7. Shih / The Army</option>
                <option value="8">8. Pi / Holding Together [union]</option>
                <option value="9">9. Hsiao Ch'u / The Taming Power of the Small</option>
                <option value="10">10. Lü / Treading [conduct]</option>
                <option value="11">11. T'ai / Peace</option>
                <option value="12">12. P'i / Standstill [Stagnation]</option>
                <option value="13">13. T'ung Jên / Fellowship with Men</option>
                <option value="14">14. Ta Yu / Possession in Great Measure</option>
                <option value="15">15. Ch'ien / Modesty</option>
                <option value="16">16. Yü / Enthusiasm</option>
                <option value="17">17. Sui / Following</option>
                <option value="18">18. Ku / Work on what has been spoiled [Decay]</option>
                <option value="19">19. Lin / Approach</option>
                <option value="20">20. Kuan / Contemplation (View)</option>
                <option value="21">21. Shih Ho / Biting Through</option>
                <option value="22">22. Pi / Grace</option>
                <option value="23">23. Po / Splitting Apart</option>
                <option value="24">24. Fu / Return (The Turning Point)</option>
                <option value="25">25. Wu Wang / Innocence (The Unexpected)</option>
                <option value="26">26. Ta Ch'u / The Taming Power of the Great</option>
                <option value="27">27. I / Corners of the Mouth (Providing Nourishment)</option>
                <option value="28">28. Ta Kuo / Preponderance of the Great</option>
                <option value="29">29. K'an / The Abysmal (Water)</option>
                <option value="30">30. Li / The Clinging, Fire</option>
                <option value="31">31. Hsien / Influence (Wooing)</option>
                <option value="32">32. Hêng / Duration</option>
                <option value="33">33. TUN / Retreat</option>
                <option value="34">34. Ta Chuang / The Power of the Great</option>
                <option value="35">35. Chin / Progress</option>
                <option value="36">36. Ming I / Darkening of the light</option>
                <option value="37">37. Chia Jên / The Family [The Clan]</option>
                <option value="38">38. K'uei / Opposition</option>
                <option value="39">39. Chien / Obstruction</option>
                <option value="40">40. Hsieh / Deliverance</option>
                <option value="41">41. Sun / Decrease</option>
                <option value="42">42. I / Increase</option>
                <option value="43">43. Kuai / Break-through (Resoluteness)</option>
                <option value="44">44. Kou / Coming to Meet</option>
                <option value="45">45. Ts'ui / Gathering Together [Massing]</option>
                <option value="46">46. Shêng / Pushing Upward</option>
                <option value="47">47. K'un / Oppression (Exhaustion)</option>
                <option value="48">48. Ching / The Well</option>
                <option value="49">49. Ko / Revolution (Molting)</option>
                <option value="50">50. Ting / The Caldron</option>
                <option value="51">51. Chên / The Arousing (Shock, Thunder)</option>
                <option value="52">52. Kên / Keeping Still, Mountain</option>
                <option value="53">53. Chien / Development (Gradual Progress)</option>
                <option value="54">54. Kuei Mei / The Marrying Maiden</option>
                <option value="55">55. Fêng / Abundance [Fullness]</option>
                <option value="56">56. Lü / The Wanderer</option>
                <option value="57">57. Sun / The Gentle (The Penetrating, Wind)</option>
                <option value="58">58. Tui / The Joyous, Lake</option>
                <option value="59">59. Huan / Dispersion [Dissolution]</option>
                <option value="60">60. Chieh / Limitation</option>
                <option value="61">61. Chung Fu / Inner Truth</option>
                <option value="62">62. Hsiao Kuo / Preponderance of the Small</option>
                <option value="63">63. Chi Chi / After Completion</option>
                <option value="64">64. Wei Chi / Before Completion</option>
            </select>
            <div>
                <input type="checkbox" name="line[]" value="1">Line 1<br>
                <input type="checkbox" name="line[]" value="2">Line 2<br>
                <input type="checkbox" name="line[]" value="3">Line 3<br>
                <input type="checkbox" name="line[]" value="4">Line 4<br>
                <input type="checkbox" name="line[]" value="5">Line 5<br>
                <input type="checkbox" name="line[]" value="6">Line 6
            </div>
            <input type='submit' name='gethex' value='Get Hexagram'>
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
