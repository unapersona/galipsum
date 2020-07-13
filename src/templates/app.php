<?php require_once 'parts/header.php'; ?>


<div class="wrapper">
    <header>
        <h1 class="text-center">GALipsum</h1>
    </header>
    <section class="row texts">
        <div class="col-4 sidebar">
            <ul class="menu">
            <?php foreach( $this->texts as $key => $item): ?>
                <li>
                    <label class="field is-vertical-align">
                        <input type="radio" name="origin" value="<?php echo $key; ?>">
                        <span class="label"><?php echo $item['title']; ?></span>
                    </label>
                </li>
            <?php endforeach; ?>
            </ul>
            <form class="options">
                <div class="row is-vertical-align">
                    <label class="col-4" for="letras">Número</label>
                    <input class="col-4" id="letras" name="letras" type="number" value="100" step="10" />
                </div>
                <div class="row">
                    <label class="col is-vertical-align">
                        <input type="checkbox" name="parrafos">
                        <span>Incluír etiqueta &lt;p&gt;</span>
                    </label>
                </div>
            </form>
        </div>
        <div class="col-8 content">
            <textarea id="text">Quiere la boca exhausta vid, kiwi, piña y fugaz jamón. Fabio me exige, sin tapujos, que añada cerveza al whisky. Jovencillo emponzoñado de whisky, ¡qué figurota exhibes! La cigüeña tocaba cada vez mejor el saxofón y el búho pedía kiwi y queso. El jefe buscó el éxtasis en un imprevisto baño de whisky y gozó como un duque. Exhíbanse politiquillos zafios, con orejas kilométricas y uñas de gavilán. El cadáver de Wamba, rey godo de España, fue exhumado y trasladado en una caja de zinc que pesó un kilo. El pingüino Wenceslao hizo kilómetros bajo exhaustiva lluvia y frío, añoraba a su querido cachorro. El veloz murciélago hindú comía feliz cardillo y kiwi. La cigüeña tocaba el saxofón detrás del palenque de paja.Quiere la boca exhausta vid, kiwi, piña y fugaz jamón. Fabio me exige, sin tapujos, que añada cerveza al whisky. Jovencillo emponzoñado de whisky, ¡qué figurota exhibes! La cigüeña tocaba cada vez mejor el saxofón y el búho pedía kiwi y queso. El jefe buscó el éxtasis en un imprevisto baño de whisky y gozó como un duque. Exhíbanse politiquillos zafios, con orejas kilométricas y uñas de gavilán.</textarea>
            <div class="text-right">
                <button
                    class="button copy"
                    data-clipboard-target="textarea#text"
                >Copiar</button>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    galipsum = { texts: <?php echo json_encode($this->texts); ?> }
</script>

<?php require_once 'parts/footer.php'; ?>
