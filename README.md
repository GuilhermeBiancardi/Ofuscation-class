# Ofuscation-class

## Inclusão da Classe

```php
    include_once "diretorio/Ofuscation.class.php";
```

## Chamada da Classe

```php
    $hide = new Ofuscation();
```

### Gerando uma Key

```php
    $hide = new Ofuscation();
    $key = $hide->getKey();
```

### Enviando uma Key para a classe

```php
    $hide = new Ofuscation();
    $key = $hide->getKey();
    $hide->setKey($key);
```

### Ofuscando um texto

```php
    $hide = new Ofuscation();
    $key = $hide->getKey();
    $hide->setKey($key);
    $newText = $hide->hash("TEXT_HERE");
```

### Revelando um texto ofuscado

```php
    $hide = new Ofuscation();
    $key = $hide->getKey();
    $hide->setKey($key);
    $ofuscatedText = "OFUSCATED_TEXT_HERE";
    $oldText = $hide->unhash($ofuscatedText);
```

Obs: Este metodo de ocultação, assim como alguns outros, não é seguro, por isso, utilize apenas em casos específicos onde a segurança não dependa desses dados!

Aproveitem!
