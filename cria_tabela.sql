CREATE TABLE `exercicio4`.`tarefa` (
  `tarefa_id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(50) NOT NULL,
  `descricao` VARCHAR(200) NOT NULL,
  `prioridade` INT NOT NULL,
  PRIMARY KEY (`tarefa_id`))
COMMENT = '	';
