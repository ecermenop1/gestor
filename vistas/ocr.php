
		<?php 
		session_start();
		if(isset($_SESSION['usuario'])){
		
		include ("header.php")
		
		?>
 <header style="background-color:seagreen">
 <link rel="stylesheet" href="OCR/style/ocr.css">
		<h1>
		SOLUCIONES IT
		</h1>


		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="OCR/style/ocr.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://kit.fontawesome.com/4414288e8e.js"></script>
	<script src='js/tesseract.min.js'></script>
		</header>
			 
	  
      <main>
		<h2>
			<p id="instructions">Sube tus imágenes, selecciona tu idioma y presiona "Ejecutar" para extraer el texto.</p>
			</h2>
			
          <div class="container mt-3">
			  <div class="row">
				  <div class="col-12 col-md-4 ">
						<select id="langsel">
							<option value='afr'     > Afrikaans             </option>
							<option value='ara'     > Arabic                </option>
							<option value='aze'     > Azerbaijani           </option>
							<option value='bel'     > Belarusian            </option>
							<option value='ben'     > Bengali               </option>
							<option value='bul'     > Bulgarian             </option>
							<option value='cat'     > Catalan               </option>
							<option value='ces'     > Czech                 </option>
							<option value='chi_sim' > Chinese               </option>
							<option value='chi_tra' > Traditional Chinese   </option>
							<option value='chr'     > Cherokee              </option>
							<option value='dan'     > Danish                </option>
							<option value='deu'     > German                </option>
							<option value='ell'     > Greek                 </option>
							<option value='eng'     selected> English       </option>
							<option value='enm'     > English (Old)         </option>
							<option value='meme'    > Internet Meme         </option>
							<option value='epo'     > Esperanto             </option>
							<option value='epo_alt' > Esperanto alternative </option>
							<option value='equ'     > Math                  </option>
							<option value='est'     > Estonian              </option>
							<option value='eus'     > Basque                </option>
							<option value='fin'     > Finnish               </option>
							<option value='fra'     > French                </option>
							<option value='frk'     > Frankish              </option>
							<option value='frm'     > French (Old)          </option>
							<option value='glg'     > Galician              </option>
							<option value='grc'     > Ancient Greek         </option>
							<option value='heb'     > Hebrew                </option>
							<option value='hin'     > Hindi                 </option>
							<option value='hrv'     > Croatian              </option>
							<option value='hun'     > Hungarian             </option>
							<option value='ind'     > Indonesian            </option>
							<option value='isl'     > Icelandic             </option>
							<option value='ita'     > Italian               </option>
							<option value='ita_old' > Italian (Old)         </option>
							<option value='jpn'     > Japanese              </option>
							<option value='kan'     > Kannada               </option>
							<option value='kor'     > Korean                </option>
							<option value='lav'     > Latvian               </option>
							<option value='lit'     > Lithuanian            </option>
							<option value='mal'     > Malayalam             </option>
							<option value='mkd'     > Macedonian            </option>
							<option value='mlt'     > Maltese               </option>
							<option value='msa'     > Malay                 </option>
							<option value='nld'     > Dutch                 </option>
							<option value='nor'     > Norwegian             </option>
							<option value='pol'     > Polish                </option>
							<option value='por'     > Portuguese            </option>
							<option value='ron'     > Romanian              </option>
							<option value='rus'     > Russian               </option>
							<option value='slk'     > Slovakian             </option>
							<option value='slv'     > Slovenian             </option>
							<option value='spa'     > Spanish               </option>
							<option value='spa_old' > Old Spanish           </option>
							<option value='sqi'     > Albanian              </option>
							<option value='srp'     > Serbian (Latin)       </option>
							<option value='swa'     > Swahili               </option>
							<option value='swe'     > Swedish               </option>
							<option value='tam'     > Tamil                 </option>
							<option value='tel'     > Telugu                </option>
							<option value='tgl'     > Tagalog               </option>
							<option value='tha'     > Thai                  </option>
							<option value='tur'     > Turkish               </option>
							<option value='ukr'     > Ukrainian             </option>
							<option value='vie'     > Vietnamese            </option>
						</select>
				  </div>




				  <!-- formulario de archivos -->
		 <form  id="frmArchivos" enctype="multipart/form-data " method="POST" >
				  <div class="col-12 col-md-4 mt-3 mt-md-0">
						<div class="box">
						<!-- <input type="file" name="archivos[]" id="archivos" class="form-control" multiple="multiple"> -->
					
						<label>Selecciona Categoria</label>
        	<select name="categoriasArchivos" id="categoriasArchivos"></select>
		
        	
			
			<label>No. Factura:</label>
        	<input type="text" name="nofactura" id="nofactura" class="form-control">
			<label>No. Nit:</label>
        	<input type="text" name="nonit" id="nonit" class="form-control">
			<label>Total:</label>
        	<input type="text" name="total" id="total" class="form-control">
	
						<input type="file" name="archivos[]" id="archivos"  class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
						
						
				
							<!-- <input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple /> -->
							<label for="archivos"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Elegir una imagen&hellip;</span></label>
						</div>
				  </div>
</form> 











				  <div class="row">
		    	<div class="col-sm-12">
		    		<span style="font-size: 20px;" class="btn btn-primary" style="width: 200%" style="height:500%"data-toggle="modal" data-target="#modalAgregaCategoria">
		    			 <span class="fas fa-plus-circle" ></span> Guardar OCR
		    		</span>
		    	</div>
		    </div>
			<div class="modal fade" id="modalAgregaCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" class="text-center" id="exampleModalLabel" style="font-size: 25px;">Guardar OCR</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="guardarocr">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" onclick="extraer()">Extraer OCR</button>
		<button type="button"  id="btnGuardarArchivos" class="btn btn-success" >Guardar Datos</button>
		
      </div>
    </div>
  </div>
</div>




<script>
					function extraer(){
					var el = document.getElementById("log").textContent;

  					var str = el; 
					var nit = str.search("Nit: ");
  					var n = str.search("Factura");
					 var t = str.search("TOTAL: ");
					var fac = str.search("Factura No: "); 
  					var f = str.search("Fecha: ");
  					var $m = str.substr(nit+5,n-nit-5) ;
					var $p = str.substr(fac+12,f-fac-12);
					var $To = str.substr(t+7,t-8);
		
					 document.getElementById("nofactura").value=$p;
					 document.getElementById("nonit").value=$m;
					 document.getElementById("total").value=$To;
					}
					</script>



				  <!-- <div class="col-12 col-md-4 mt-3 mt-md-0">
					<div class="box">
						<button class="funcion" id="extraer">GUARDAR</button>
					</div>
					 -->
			  </div>
			  </div>
			  <div class="row">
				  <div class="col-12 col-md-5">
				  
					<div class="image-container"><img id="selected-image"  src="OCR/images/Ocr_image.jpg" class="col-12 p-0" /></div>
				  </div>
				  <div class="col-12 col-md-1">
					<i id="arrow-right" class="fas fa-arrow-right d-none d-md-block"></i>
					<i id="arrow-down" class="fas fa-arrow-down d-block d-md-none"></i>
				  </div>
				  <div class="col-12 col-md-6" id="mod">
					<div id="log">
							<span id="startPre">	
								<a id="startLink" href="#">Haga clic aquí para reconocer el texto</a>
								<br/> Elegir una imagen
							</span>
					</div>
				</div>
			  </div>
		</div>
	  </main>

	

	  <?php 
	  
		include ("footer.php");
		
		

		
		?>


<!-- //seleccionando categoriasArchivos -->

<script src="../js/gestor.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#tablaGestorArchivos').load("gestor/tablaGestor.php");
				$('#categoriasArchivos').load("categorias/selectCategorias.php");
	
				
	
			});
		</script>
	




<!-- GUardar datos -->

	<script type="text/javascript">
		$(document).ready(function(){
		

			$('#btnGuardarArchivos').click(function(){
				var formData = new FormData(document.getElementById('frmArchivos'));
			
				
	$.ajax({
		url:"../procesos/gestor/guardarArchivos.php",
		type:"POST",
		datatype: "html",
		data: formData,
		cache:false,
		contentType:false,
		processData:false,
		success:function(respuesta){
			console.log(respuesta);
			respuesta = respuesta.trim();

			if (respuesta == 1) {
				
				
				swal(":D", "Agregado con exito!", "success");
			} else {
				swal(":(", "Fallo al agregar !", "error");
			}
		}
	});
			});

		});
	</script>










<!-- <script>
function agregarUsuarioNuevo() {
			$.ajax({
				method: "POST",
				data: $('#frmRegistro').serialize(),
				url: "procesos/usuario/registro/agregarUsuario.php",
				success:function(respuesta){

					respuesta = respuesta.trim();

					if (respuesta == 1) {
						$("#frmRegistro")[0].reset();
						swal(":D", "Agregado con exito!", "success");
					} else if(respuesta == 2){
						swal("Este usuario ya existe, por favor escribe otro !!!");
					} else {
						swal(":(", "Fallo al agregar!", "Error");
					}
				}
			});

			</script> -->

   <?php 
} else {
	header("location:../index.php");
}
?>