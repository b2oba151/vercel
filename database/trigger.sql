BEGIN
    IF OLD.compte!=NEW.compte THEN
        INSERT INTO variations (user_id, avant, apres, variation,created_at,updated_at)
        VALUES (NEW.id, OLD.compte, NEW.compte, NEW.compte - OLD.compte,now(),now());
    END IF;
END


DELIMITER $$
CREATE TRIGGER `declecheur_variation` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
    IF OLD.compte!=NEW.compte THEN
        INSERT INTO variations (user_id, avant, apres, variation,created_at,updated_at)
        VALUES (NEW.id, OLD.compte, NEW.compte, NEW.compte - OLD.compte,now(),now());
    END IF;
END
$$
DELIMITER ;
