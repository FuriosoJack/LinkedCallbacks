# Bienvenido LinkedCallbacks para PHP
Con este repositorio podra crear lista enlazadas de Callbacks, esto es muy util cuando dese realizar enlazar tarea.


Prodra hacer cosas como esta

```php

 $listCallbacks = new FuriosoJack\LinkedCallbacks\ListDoubleCallbacks();

  $listCallbacks->insertFirst(function($node){
            return "hola primer mundo";
  },10);
  
  $message = "mensaje a cifrar";
  
  $listCallbacks->insertFirst(function($node) use($message){
      return base64_encode($message);
  },null);
  
   $firstNode = $listCallbacks->firstNode();
   for($x = $firstNode; $x != null; $x = $x->getNodeNext()){
          echo $x->run();
   }
   
   //el resultado sera el siguiente
   
   hola primer mundo
   j7r'j
   
```

Cada Nodo esta compuesto con un Key y con un callback, el callback del nodo va a recibir como paremero el mismo nodo que lo conteniene. 
Si desea darse una mejor idea revise los test, [Ir a los Test](https://github.com/FuriosoJack/LinkedCallbacks/tree/master/tests)






