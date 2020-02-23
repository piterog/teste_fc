<div class="text-center">
    <h2 class="page-header">
        <?php echo $model->id != null ? $model->nome : 'Novo médico'; ?>
    </h2>
</div>

<ol class="breadcrumb">
  <li><a href="?c=medicos">Médicos</a></li>
  <li class="active"><?php echo $model->id != null ? '&nbsp;<small>>></small> ' .$model->nome : '&nbsp;<small>>></small> Novo'; ?></li>
</ol>

<?php if(isset($error_messages)){ ?>
    <span class="input-error"><small><?php echo $error_messages; ?></small></span>
<?php } ?>

<form id="form-medico" action="?c=medicos&action=createOrUpdate" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $model->id; ?>" />
      <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $model->nome; ?>" class="form-control form-input" placeholder="Digite o nome do médico">
        <span class="input-error"></span>
    </div>
    <?php if($model->id == null){ ?>
    <div class="form-group">
        <label>Email:</label>
        <!-- Para testar o email sem a validação do HTML 5, altere o tipo de email para text -->
        <input type="email" name="email" value="<?php echo $model->email; ?>" class="form-control form-input" placeholder="Digite o email do médico">
        <span class="input-error"></span>
    </div>
    <?php } ?>
    <div class="form-group">
        <label>Senha:</label>
        <input type="password" name="senha" value="" class="form-control form-input" placeholder="Digite a senha do médico">
        <span class="input-error"></span>
    </div>
    
    <div class="form-group">
        <label>Endereço do Consultório:</label>
        <input type="text" name="endereco_consultorio" value="<?php echo $model->endereco_consultorio; ?>" class="form-control form-input" placeholder="Digite o endereço do consultório">
        <span class="input-error"></span>
    </div>     
    
    <hr/>
    
    <div class="text-right">
        <button class="btn btn-primary" id="btn-submit">Salvar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        /*
        *   Para testar a validação do backend, altere a variabel debugBackend para true;
        */
        let debugBackend = false;

        let editing = $("input[name='id']").val() == "" ? false : true;

        if(!debugBackend){
            $("#btn-submit").click( (e) => {
                e.preventDefault();
                let _this = $("this");

                $(".input-error").html("");

                let email   = $("input[name='email']");
                let nome    = $("input[name='nome']");
                let pass    = $("input[name='senha']");
                let ec      = $("input[name='endereco_consultorio']");
                let checkLength    = false;
                let checkEmailType  = false;

                let validation = [nome, ec];

                if(pass.val().length > 0 || $("input[name='id']").val() == ""){
                    validation.push(pass);
                }

                if(editing){                   
                    checkEmailType = true;
                }else{
                    validation.push(email);
                    if(validateEmail(email)){
                        checkEmailType = true;
                    }
                }

                let hits = 0;    
                validation.map( (el, key) => {
                    if(stringLength(el, 6, 112)){
                        hits++;
                    }

                    if(hits === validation.length){
                        checkLength = true;
                    }
                });

                if(checkEmailType && checkLength){
                    $("#form-medico").submit();
                }
            
                function stringLength(input, minlength, maxlength){ 
                    let field = input.val(); 
                    let mnlen = minlength;
                    let mxlen = maxlength;

                    if(field.length < mnlen){ 
                        let html = "<small>Este campo deve conter pelo menos "+mnlen+" caracteres!</small>";
                        input.next('span').html(html);
                        return false;
                    }

                    if(field.length > mxlen){
                        let html = "<small>Este campo não deve conter mais de "+mxlen+" caracteres!</small>";
                        input.next('span').html(html);
                        return false;
                    }

                    return true;
                }

                function validateEmail(input){
                    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(input.val())){
                        return true
                    }
                    let html = "<small>O campo de email possui um formato inválido!</small>";
                    input.next('span').html(html);
                    return false
                }
            });
        }
    });
</script>

<?php include_once("../partials/footer.php") ?>