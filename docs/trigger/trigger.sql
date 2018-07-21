CREATE DEFINER = CURRENT_USER TRIGGER `libraryitego`.`emprestimo_multa` AFTER UPDATE ON `emprestimo` FOR EACH ROW
BEGIN

	IF data_devolucao > DATE_ADD(data_emprestimo, INTERVAL 7 DAY) then;
    
		insert into multa ()
		
    END IF;

END
