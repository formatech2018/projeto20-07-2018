CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_patrimonio_update`(pantigoid int, pnovoid int)
BEGIN
    UPDATE patrimonio set idpatrimonio = pnovoid where idpatrimonio = pantigoid;
    
    select idpatrimonio from patrimonio where idpatrimonio = pnovoid;

END