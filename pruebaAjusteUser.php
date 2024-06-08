<?php
class Users {

    private $basedata;

    public function __construct() {

        require "basedata2.php";
        $this->basedata = new baseData;

    }

    public function usuarios(){

      $sql = "SELECT * FROM users";
      $stmt = $this->basedata->conexion()->prepare($sql);
      $stmt->execute();

      while ($row = $stmt->fetch()) {
        
          if ($row['nivel'] == 'A'){
          
              $nivel = "Director(a)";
              $nivel1 = "Secretario(a)";
              
          }else{
              
              $nivel = "Secretario(a)";
              $nivel1 = "Director(a)";
          
          }

          $datos = array(  
              //datos del alumno
              "id" => $row['id'],
              "usuario" => $row['usuario'],
              "nivel" => $nivel,
              "block" => $row['activo'],
            );

          if ($row['activo'] == 'si'){
          
              $block = '
              <form action="src/users.delete.php" method="post">
                  <input type="hidden" name="id" value="'.$row['id'].'">
                  <input type="hidden" name="datos" value="no">
                  <button type="submit" name="Lock" id="Lock" class="btn btn-danger">Bloquear usuario <span class="fa fa-lock"></span></button>
              </form><br>';
              
          }else{
              
              $block = '
              <form action="src/users.delete.php" method="post">
                  <input type="hidden" name="id" value="'.$row['id'].'">
                  <input type="hidden" name="datos" value="si">
                  <button type="submit" name="Unlock" id="Unlock" class="btn btn-success">Desbloquear usuario <span class="fa fa-unlock"></span></button>
              </form><br>';
          
          }

          echo $this->verDetalles($datos);
          echo '
                  <div class="container">
                      <div class="card o-hidden border-0 shadow-lg my-5">
                          <div class="card-body ">

                              <div class="row">
                                  <div class="col">
                                      <div class="p-5">

                                          <div class="text-center">
                                              <h1 class="h4 text-gray-900 mb-4"><i class="fa fa-user"></i> Datos de Usuario</h1>
                                          </div>

                                          <div class="row">
                                              <div class="col-sm-12">
                                                  <div class="form-group row">

                                                      <form id="Form" class="user" action="signup.inc.php" method="POST">

                                                        <div class="mb-3">Usuario:
                                                          <input id="usuario" name="usuario" type="text" class="form-control" value="'.$row['usuario'].'" placeholder="Nombre" required>
                                                        </div>

                                                          <div class="mb-3">
                                                              <label for="genero_a">Nivel de Usuario:</label>
                                                                  <select name="genero_a" id="genero_a" class="form-control" required>
                                                                      <option value="'.$nivel.'">'.$nivel.'</option>
                                                                      <option value="'.$nivel1.'">'.$nivel1.'</option>
                                                                  </select>
                                                          </div>

                                                          <div class="col-sm-12">
                                                              <button type="submit" class="btn btn-primary" id="submitBtn" name="submit">Guardar Cambios</button>
                                                          </div> <br>

                                                          <hr>

                                                      </form>

                                                      <div class="col ml-4">
                                                       <br> <br>';

                                                      echo $block;

                                                      echo'</div>

                                                  </div>
                                              </div>
                                          </div>


                                      </div>
                                  </div>
                              </div>


                          </div>
                      </div>
                  </div>
              ';

      }
  }

  public function verDetalles($datos) { 

      echo '<div class="modal fade" id="verDetalles-'. $datos['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Cambio de Contraseña</h5>
            </div>

              <div class="modal-body">

                  <form id="Form" class="user" action="signup.inc.php" method="POST">

                      <p> Usuario: ' . $datos['usuario'] . ', Nivel de Usuario: ' . $datos['nivel'] . '</p>

                      <div class="col mb-3">
                          <input id="clave" name="clave" type="password" class="form-control" placeholder="Contraseña Actual" required>
                      </div>

                      <div class="col mb-3">
                        <input id="new_password" name="new_password" type="password" class="form-control" placeholder="Nueva Contraseña" required>
                      </div>

                      <div class="col mb-3">
                        <input id="confirm_clave" name="confirm_clave" type="password" class="form-control" placeholder="Confirmar Contraseña" required>
                      </div>

                  <div class="col form-group">
                      <label><input id="ver" name="ver" type="checkbox" onclick="togglepassword()" class="form-control-user"> Mostrar Contraseña</label>
                  </div>

                  </form>

              </div>

            <div class="modal-footer">
              <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar <span class="fa fa-save"></span></button>
            </div>

          </div>
        </div>
      </div>
      ';
    }

    public function delete($id){

      $sql = "DELETE FROM users WHERE id=:id";
      $stmt = $this->basedata->conexion()->prepare($sql);
      $stmt->bindParam(':id', $id);
      
      if ($stmt->execute()) {

        header("Location: ../perfil.php");

      } else {

          return false;
          
      } 

    }

    public function Estado($valor, $id) {
      $sql = "UPDATE users SET estado=:estado WHERE id=:id";
      $stmt = $this->basedata->conexion()->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':estado', $valor);
      
      if ($stmt->execute()) {

        header("Location: ../perfil.php");

      } else {

        return "Error al actualizar los datos del alumno: " . $stmt->errorInfo()[2];
        
      }
    }


    public function actualizar($datos) { 

      $sql = "SELECT * FROM auditoria
      INNER JOIN users ON users.id = auditoria.id_usuario
      WHERE id_usuario LIKE :keyword
      OR entrada LIKE :keyword
      OR acciones LIKE :keyword
      OR salida LIKE :keyword";

    }
}
?>