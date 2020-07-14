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
                <div class="row is-center is-vertical-align">
                    <label class="is-hidden" for="length">Lonxitude</label>
                    <input class="col-3" id="length" name="length" type="number" value="150" step="10" min="10" max="2000" />
                    <div class="col-6">
                        <label>
                            <input type="radio" name="measure" value="words" checked />
                            Palabras
                        </label><br>
                        <label>
                            <input type="radio" name="measure" />
                            Caracteres
                        </label>
                    </div>
                </div>
                <!--
                <div class="row">
                    <label class="col is-vertical-align">
                        <input type="checkbox" name="paragraphs">
                        <span>Incluír etiqueta &lt;p&gt;</span>
                    </label>
                </div>
                -->
            </form>
        </div>
        <div class="col-8 content">
            <label class="is-hidden" for="text">Resultado</label>
            <textarea id="text"></textarea>
            <div class="row">
                <div class="col info">
                    <strong class="title"></strong><br>
                    <em class="author"></em>
                </div>
                <div class="col text-right">
                    <button
                        class="button copy"
                        data-clipboard-target="textarea#text"
                    >Copiar</button>
                </div>
            </div>
            <div class="">

            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    galipsum = { texts: <?php echo json_encode($this->texts); ?> }
</script>

<?php require_once 'parts/footer.php'; ?>
