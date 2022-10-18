select concat(u.nome,' - ',info.genero), if(Year(now())-ano_nascimento>50,"SIM","NÃO") as maior_50_anos from usuario u 
join info on info.cpf =u.cpf
order by info.genero desc, info.cpf asc
;