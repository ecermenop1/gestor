<script>
clase App_Search_Helper_PdfParser
{
    / **
     * Convertir un PDF en texto.
     *
     * @param string $ filename El nombre de archivo del que se extraerán los datos.
     * @return string El texto extraído del PDF
     * /
     función pública pdf2txt ( $ datos )
    {
        / **
         * Divida el documento PDF en secciones. Abordaremos cada
         * sección por separado.
         * /
        $ a_obj  =  $ esto -> getDataArray ( $ datos ,  "obj" ,  "endobj" ) ;
        $ j      =  0 ;
 
        / **
         * Intente extraer cada parte del documento PDF en un "filtro"
         * elemento y un elemento de "datos". Esto se puede utilizar para decodificar el
         * datos.
         * /
        foreach  ( $ a_obj  como  $ obj )  {
            $ a_filter  =  $ this -> getDataArray ( $ obj ,  "<<" ,  ">>" ) ;
            if  ( is_array ( $ a_filter )  &&  isset ( $ a_filter [ 0 ] ) )  {
                $ a_chunks [ $ j ] [ "filtro" ]  =  $ a_filter [ 0 ] ;
                $ a_data  =  $ this -> getDataArray ( $ obj ,  "stream" ,  "endstream" ) ;
                if  ( is_array ( $ a_data )  &&  isset ( $ a_data [ 0 ] ) )  {
                    $ a_chunks [ $ j ] [ "datos" ]  =  trim ( substr ( $ a_data [ 0 ] ,  strlen ( "flujo" ) ,  strlen ( $ a_data [ 0 ] )  -  strlen ( "flujo" )  -  strlen ( "endstream" ) ) ) ;
                }
                $ j ++;
            }
        }
 
        $ result_data  =  NULL ;
 
        // decodifica los trozos
        foreach  ( $ a_chunks  como  $ chunk )  {
            // Mira cada fragmento decide si podemos decodificarlo mirando el contenido del filtro
            if  ( isset ( $ chunk [ "datos" ] ) )  {
                // mira el filtro para averiguar qué codificación se ha utilizado
                if  ( strpos ( $ chunk [ "filter" ] ,  "FlateDecode" )  ! ==  false )  {
                    // Usa gzuncompress pero suprime los mensajes de error.
                    $ datos  = @  gzuncompress ( $ fragmento [ "datos" ] ) ;
                    if  ( trim ( $ datos )  ! =  "" )  {
                        // Si obtuvimos datos, intente extraerlos.
                        $ result_data  . =  ''  .  $ esto -> ps2txt ( $ datos ) ;
                    }
                }
            }
        }
        / **
         * Asegúrese de que no tengamos grandes bloques de espacios en blanco antes y después
         * nuestra cadena. También extrae información alfanumérica para reducir
         * datos redundantes.
         * /
        $ result_data  =  trim ( preg_replace ( '/ ([^ a-z0-9]) / i' ,  '' ,  $ result_data ) ) ;
 
        // Devuelve los datos extraídos del documento.
        if  ( $ result_data  ==  "" )  {
            return  NULL ;
        }  más  {
            return  $ result_data ;
        }
    }
 
    / **
     * Elimina el texto de una pequeña cantidad de datos.
     *
     * @param string $ ps_data El fragmento de datos que se va a convertir.
     * @return string La cadena extraída de los datos.
     * /
     función pública ps2txt ( $ ps_data )
    {
        // Detiene esta función que devuelve información falsa de una cadena que no es de datos.
        si  ( ord ( $ ps_data [ 0 ] )  <  10 )  {
            return  $ ps_data ;
        }
        if  ( substr ( $ ps_data ,  0 ,  8  )  ==  '/ CIDInit' )  {
            volver  '' ;
        }
 
        $ resultado  =  "" ;
 
        $ a_data  =  $ esto -> getDataArray ( $ ps_data ,  "[" ,  "]" ) ;
 
        // Extrae los datos.
        if  ( is_array ( $ a_data ) )  {
            foreach  ( $ a_data  como  $ ps_text )  {
                $ a_text  =  $ this -> getDataArray ( $ ps_text ,  "(" ,  ")" ) ;
                if  ( is_array ( $ a_text ) )  {
                    foreach  ( $ a_text  as  $ text )  {
                        $ resultado  . =  substr ( $ texto ,  1 ,  strlen ( $ texto )  -  2 ) ;
                    }
                }
            }
        }
 
        // No capté nada, intente una forma diferente de extraer los datos
        if  ( recortar ( $ resultado )  ==  "" )  {
            // los datos pueden estar en formato sin procesar (fuera de las etiquetas [])
            $ a_text  =  $ this -> getDataArray ( $ ps_data ,  "(" ,  ")" ) ;
            if  ( is_array ( $ a_text ) )  {
                foreach  ( $ a_text  as  $ text )  {
                    $ resultado  . =  substr ( $ texto ,  1 ,  strlen ( $ texto )  -  2 ) ;
                }
            }
        }
 
        // Elimina los caracteres perdidos que quedan.
        $ resultado  =  preg_replace ( '/ \ b ([^ a | i]) \ b / i' ,  '' ,  $ resultado ) ;
        return  trim ( $ resultado ) ;
    }
 
    / **
     * Convierta una sección de datos en una matriz, separada por las palabras inicial y final.
     *
     * @param string $ data Los datos.
     * @param string $ start_word El inicio de cada sección de datos.
     * @param string $ end_word El final de cada sección de datos.
     * @return array La matriz de datos.
     * /
     función pública getDataArray ( $ data ,  $ start_word ,  $ end_word )
    {
        $ inicio     =  0 ;
        $ fin       =  0 ;
        $ a_result  =  array ( ) ;
 
        while  ( $ start  ! ==  false  &&  $ end  ! ==  false )  {
            $ inicio  =  strpos ( $ datos ,  $ palabra_inicio ,  $ fin ) ;
            $ fin    =  strpos ( $ datos ,  $ palabra_final ,  $ inicio ) ;
            if  ( $ end  ! ==  false  &&  $ start  ! ==  false )  {
                // los datos están entre el inicio y el final
                $ a_result [ ]  =  substr ( $ data ,  $ start ,  $ end  -  $ start  +  strlen ( $ end_word ) ) ;
            }
        }
 
        return  $ a_result ;
    }
}
</script>




