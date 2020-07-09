# Dictionnaire de données
## Tasks (`Tasks`)
|Champ|Type|Spécificité|Description|
|-|-|-|-|
|`id`|`INT`|`PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT`|`Tasks ID`|
|`title`|`VARCHAR(70)`|`NOT NULL`|`Tasks title`|
|`completion`|`FLOAT`|`NULL`|`Tasks %`|
|`category_id`|`TINYINT(1)`|`NULL`|`Tasks category_id`|
|`status`|`TINYINT(1)`|`NULL`|`Tasks status`|
|`created_at`|`DATE`|`NOT NULL`|`Tasks created_at`|
|`updated_at`|`DATE`|`NULL`|`Tasks updated_at`|
## Categories (`Categories`)
|Champ|Type|Spécificité|Description|
|-|-|-|-|
|`id`|`INT`|`PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT`|`Categories ID`|
|`name`|`VARCHAR(70)`|`NOT NULL`|`Categories title`|
|`status`|`TINYINT(1)`|`NULL`|`Categories status`|
|`created_at`|`DATE`|`NOT NULL`|`Categories created_at`|
|`updated_at`|`DATE`|`NULL`|`Categories updated_at`|
