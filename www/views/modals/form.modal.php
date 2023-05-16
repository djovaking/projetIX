<?php foreach ($errors as $error):?>
<li><?=$error ?></li>
<?php endforeach;?>

<form
    method="<?= $config["config"]["method"]??"GET";?>"
    action="<?= $config["config"]["action"]??"";?>"
    class="<?= $config["config"]["class"]??"";?>"
    id="<?= $config["config"]["id"]??"";?>"
>

    <?php foreach ($config["inputs"] as $name=>$attr):?>

        <input
                type="<?= $attr['type']??'text';?>"
                placeholder="<?= $attr['placeholder']??'';?>"
                name="<?= $name ;?>"
                class="<?= $attr['class']??'';?>"
                id="<?= $attr['id']??'';?>"
                <?= (!empty($attr['required']))?"required='required'":"";?>
        ><br>

    <?php endforeach;?>


    <input type="submit" name="submit" value="<?= $config["config"]["submit"]??"Confirmer";?>">
    <input type="reset" value="<?= $config["config"]["cancel"]??"Annuler";?>">
</form>