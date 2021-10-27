<div class="row" style="padding-top: 1px">

    <!-- <h3>Midias</h3> -->

    <?php echo form_open_multipart('Midia/upload/'); ?>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="first">Descrição da Mídia</label>
            <input type="text" class="form-control" placeholder="" name="alt" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="first">Selecione um arquivo</label>
            <input type="file" name="midia" required>
        </div>
    </div>
</div>

<input type="hidden" name="amostra_id" value="<?php echo $amostra_id ?>">

<div class="row">
    <div class="col-lg-12">
        <button name="submit" class="btn btn-primary" type="submit" id="img-submit" data-submit="...Enviando">Enviar</button>
    </div>
</div>
</form>

</div>