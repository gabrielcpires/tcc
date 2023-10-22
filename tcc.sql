-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/10/2023 às 01:42
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` int(11) NOT NULL,
  `nome_cidade` varchar(32) NOT NULL,
  `id_estado` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `cidades`
--

INSERT INTO `cidades` (`id`, `nome_cidade`, `id_estado`) VALUES
(1565, 'Abadia dos Dourados', 11),
(1566, 'Abaeté', 11),
(1567, 'Abre Campo', 11),
(1568, 'Acaiaca', 11),
(1569, 'Açucena', 11),
(1570, 'Água Boa', 11),
(1571, 'Água Comprida', 11),
(1572, 'Aguanil', 11),
(1573, 'Águas Formosas', 11),
(1574, ' Águas Vermelhas', 11),
(1575, 'Aimorés', 11),
(1576, 'Aiuruoca', 11),
(1577, 'Alagoa', 11),
(1578, 'Albertina', 11),
(1579, 'Além Paraíba', 11),
(1580, 'Alfenas', 11),
(1581, 'Alfredo Vasconcelos', 11),
(1582, 'Almenara', 11),
(1583, 'Alpercata', 11),
(1584, 'Alpinópolis', 11),
(1585, 'Alterosa', 11),
(1586, 'Alto Caparaó', 11),
(1587, 'Alto Jequitibá', 11),
(1588, 'Alto Rio Doce', 11),
(1589, 'Alvarenga', 11),
(1590, 'Alvinópolis', 11),
(1591, 'Alvorada de Minas', 11),
(1592, 'Amparo do Serra', 11),
(1593, 'Andradas', 11),
(1594, 'Andrelândia', 11),
(1595, ' Angelândia', 11),
(1596, 'Antônio Carlos', 11),
(1597, 'Antônio Dias', 11),
(1598, 'Antônio Prado de Minas', 11),
(1599, 'Araçã', 11),
(1600, 'Aracitaba', 11),
(1601, 'Araçuaí', 11),
(1602, 'Araguari', 11),
(1603, 'Arantina', 11),
(1604, 'Araponga', 11),
(1605, 'Araporã', 11),
(1606, 'Arapuá', 11),
(1607, 'Araújos', 11),
(1608, 'Araxã ¡', 11),
(1609, 'Arceburgo', 11),
(1610, 'Arcos', 11),
(1611, 'Areado', 11),
(1612, 'Argirita', 11),
(1613, 'Aricanduva', 11),
(1614, 'Arinos', 11),
(1615, 'Astolfo Dutra', 11),
(1616, 'Ataléia', 11),
(1617, 'Augusto de Lima ', 11),
(1618, 'Baependi', 11),
(1619, 'Baldim', 11),
(1620, 'Bambuí', 11),
(1621, 'Bandeira', 11),
(1622, 'Bandeira do Sul', 11),
(1623, 'Barão de Cocais', 11),
(1624, 'Barão de Monte Alto', 11),
(1625, 'Barbacena', 11),
(1626, ' Barra Longa', 11),
(1627, 'Barroso', 11),
(1628, 'Bela Vista de Minas', 11),
(1629, 'Belmiro Braga', 11),
(1630, 'Belo Horizonte', 11),
(1631, 'Belo Oriente', 11),
(1632, 'Belo Vale', 11),
(1633, 'Berilo', 11),
(1634, 'Berizal', 11),
(1635, 'Bertópolis', 11),
(1636, 'Betim', 11),
(1637, 'Bias Fortes', 11),
(1638, 'Bicas', 11),
(1639, 'Biquinhas', 11),
(1640, 'Boa Esperança', 11),
(1641, 'Bocaina de Minas', 11),
(1642, 'Bocaiúva', 11),
(1643, ' Bom Despacho', 11),
(1644, 'Bom Jardim de Minas', 11),
(1645, 'Bom Jesus da Penha', 11),
(1646, 'Bom Jesus do Amparo', 11),
(1647, ' Bom Jesus do Galho', 11),
(1648, 'Bom Repouso', 11),
(1649, 'Bom Sucesso', 11),
(1650, 'Bonfim', 11),
(1651, 'Bonfinópolis de Minas', 11),
(1652, 'Bonito de Minas', 11),
(1653, 'Borda da Mata', 11),
(1654, 'Botelhos', 11),
(1655, 'Botumirim', 11),
(1656, 'Brás Pires', 11),
(1657, 'Brasilândia de Minas', 11),
(1658, 'Brasília de Minas', 11),
(1659, 'Brasópolis', 11),
(1660, 'Braúnas', 11),
(1661, 'Brumadinho', 11),
(1662, 'Bueno Brandão', 11),
(1663, 'Buenópolis', 11),
(1664, 'Bugre', 11),
(1665, 'Buritis', 11),
(1666, 'Buritizeiro', 11),
(1667, 'Cabeceira Grande', 11),
(1668, 'Cabo Verde', 11),
(1669, 'Cachoeira da Prata', 11),
(1670, 'Cachoeira de Minas', 11),
(1671, 'Cachoeira de Pajeú', 11),
(1672, 'Cachoeira Dourada', 11),
(1673, 'Caetanópolis', 11),
(1674, 'Caeté', 11),
(1675, 'Caiana', 11),
(1676, 'Cajuri', 11),
(1677, 'Caldas', 11),
(1678, 'Camacho', 11),
(1679, 'Camanducaia', 11),
(1680, 'Cambuí', 11),
(1681, 'Cambuquira', 11),
(1682, 'Campanário', 11),
(1683, 'Campanha', 11),
(1684, 'Campestre', 11),
(1685, 'Campina Verde', 11),
(1686, 'Campo Azul', 11),
(1687, 'Campo Belo', 11),
(1688, ' Campo do Meio', 11),
(1689, 'Campo Florido', 11),
(1690, 'Campos Altos', 11),
(1691, 'Campos Gerais', 11),
(1692, 'Cana Verde', 11),
(1693, 'Canaã', 11),
(1694, 'Canápolis', 11),
(1695, 'Candeias', 11),
(1696, 'Cantagalo', 11),
(1697, 'Caparaó', 11),
(1698, 'Capela Nova', 11),
(1699, 'Capelinha', 11),
(1700, 'Capetinga', 11),
(1701, 'Capitão Branco', 11),
(1702, 'Capinópolis', 11),
(1703, 'Capitão Andrade', 11),
(1704, 'Capitão Enéias', 11),
(1705, 'Capitólio', 11),
(1706, 'Caputira', 11),
(1707, 'Caraó', 11),
(1708, 'Caranaíba', 11),
(1709, 'Carandaí', 11),
(1710, 'Carangola', 11),
(1711, 'Caratinga', 11),
(1712, 'Carbonita', 11),
(1713, 'Careaçu', 11),
(1714, 'Carlos Chagas', 11),
(1715, 'Carmésia', 11),
(1716, 'Carmo da Cachoeira', 11),
(1717, 'Carmo da Mata', 11),
(1718, 'Carmo de Minas', 11),
(1719, 'Carmo do Cajuru', 11),
(1720, 'Carmo do Paranaíba', 11),
(1721, 'Carmo do Rio Claro', 11),
(1722, 'Carmópolis de Minas', 11),
(1723, 'Carneirinho', 11),
(1724, 'Carrancas', 11),
(1725, 'Carvalhópolis', 11),
(1726, 'Carvalhos', 11),
(1727, 'Casa Grande', 11),
(1728, 'Cascalho Rico', 11),
(1729, 'Cássia', 11),
(1730, 'Cataguases', 11),
(1731, 'Catas Altas', 11),
(1732, 'Catas Altas da Noruega', 11),
(1733, 'Catuji', 11),
(1734, 'Catuti', 11),
(1735, 'Caxambu', 11),
(1736, 'Cedro do Abaeté', 11),
(1737, 'Central de Minas', 11),
(1738, 'Centralina', 11),
(1739, 'Chácara', 11),
(1740, 'Chalé', 11),
(1741, 'Chapada do Norte', 11),
(1742, 'Chapada Gaúcha', 11),
(1743, 'Chiador', 11),
(1744, 'Cipotãnea', 11),
(1745, 'Claraval', 11),
(1746, 'Claro dos Poços', 11),
(1747, 'Cláudio', 11),
(1748, 'Coimbra', 11),
(1749, 'Coluna', 11),
(1750, ' Comendador Gomes', 11),
(1751, 'Comercinho', 11),
(1752, 'Conceição da Aparecida', 11),
(1753, 'Conceição da Barra de Minas', 11),
(1754, 'Conceição das Alagoas', 11),
(1755, 'Conceição das Pedras', 11),
(1756, 'Conceição de Ipanema', 11),
(1757, 'Conceição do Mato Dentro', 11),
(1758, 'Conceição do Pará', 11),
(1759, 'Conceição do Rio Verde', 11),
(1760, 'Conceição dos Ouros', 11),
(1761, 'Cônego Marinho', 11),
(1762, ' Confins', 11),
(1763, 'Congonhas', 11),
(1764, 'Congonhas', 11),
(1765, 'Congonhas do Norte', 11),
(1766, 'Conquista', 11),
(1767, 'Conselheiro Lafaiete', 11),
(1768, 'Conselheiro Pena', 11),
(1769, 'Consolação', 11),
(1770, 'Contagem', 11),
(1771, 'Coqueiral', 11),
(1772, 'Coração de Jesus', 11),
(1773, 'Cordisburgo', 11),
(1774, 'Cordislândia', 11),
(1775, 'Corinto', 11),
(1776, 'Coroaci', 11),
(1777, 'Coromandel', 11),
(1778, 'Coronel Fabriciano', 11),
(1779, 'Coronel Murta', 11),
(1780, 'Coronel Pacheco', 11),
(1781, 'Coronel Xavier Chaves', 11),
(1782, 'Córrego Danta', 11),
(1783, 'Córrego do Bom Jesus', 11),
(1784, 'Córrego Fundo', 11),
(1785, 'Córrego Novo', 11),
(1786, 'Couto de Magalhães de Minas', 11),
(1787, 'Crisólita', 11),
(1788, 'Cristais', 11),
(1789, 'Cristália', 11),
(1790, 'Cristiano Otoni', 11),
(1791, 'Cristina', 11),
(1792, 'Crucilândia', 11),
(1793, 'Cruzeiro da Fortaleza', 11),
(1794, 'Cruzília', 11),
(1795, 'Cuparaque', 11),
(1796, 'Curral de Dentro', 11),
(1797, 'Curvelo', 11),
(1798, 'Datas', 11),
(1799, 'Delfim Moreira', 11),
(1800, 'Delfinópolis', 11),
(1801, 'Delta', 11),
(1802, 'Descoberto', 11),
(1803, 'Desterro de Entre Rios', 11),
(1804, ' Desterro do Melo', 11),
(1805, 'Diamantina', 11),
(1806, 'Diogo de Vasconcelos', 11),
(1807, 'Dionísio', 11),
(1808, 'Divinésia', 11),
(1809, 'Divino', 11),
(1810, 'Divino das Laranjeiras', 11),
(1811, 'Divinolândia de Minas', 11),
(1812, 'Divinópolis', 11),
(1813, 'Divisa Alegre', 11),
(1814, 'Divisa Nova', 11),
(1815, 'Divisópolis', 11),
(1816, 'Dom Bosco', 11),
(1817, 'Dom Cavati', 11),
(1818, 'Dom Joaquim', 11),
(1819, 'Dom Silvé rio', 11),
(1820, 'Dom Viçoso', 11),
(1821, 'Dona Eusébia', 11),
(1822, 'Dores de Campos', 11),
(1823, 'Dores de Campos', 11),
(1824, 'Dores do Indaiá', 11),
(1825, 'Dores do Turvo', 11),
(1826, 'Doresópolis', 11),
(1827, 'Douradoquara', 11),
(1828, 'Durandé', 11),
(1829, 'Elói Mendes', 11),
(1830, 'Engenheiro Caldas', 11),
(1831, 'Engenheiro Navarro', 11),
(1832, 'Entre Folhas', 11),
(1833, 'Entre Rios de Minas', 11),
(1834, 'Ervália', 11),
(1835, 'Esmeraldas', 11),
(1836, 'Espera Feliz', 11),
(1837, 'Espinosa', 11),
(1838, 'Espírito Santo do Dourado', 11),
(1839, 'Estiva', 11),
(1840, 'Estrela Dalva', 11),
(1841, 'Estrela do Indaiá', 11),
(1842, 'Estrela do Sul', 11),
(1843, 'Eugenópolis', 11),
(1844, 'Ewbank da Câmara', 11),
(1845, 'Extrema', 11),
(1846, 'Fama', 11),
(1847, 'Faria Lemos', 11),
(1848, 'Felício dos Santos', 11),
(1849, 'Felisburgo', 11),
(1850, 'Felixlândia', 11),
(1851, 'Fernandes Tourinho', 11),
(1852, 'Ferros', 11),
(1853, 'Fervedouro', 11),
(1854, 'Florestal', 11),
(1855, 'Formiga', 11),
(1856, 'Formoso', 11),
(1857, 'Fortaleza de Minas', 11),
(1858, 'Fortuna de Minas', 11),
(1859, 'Francisco Badaró', 11),
(1860, 'Francisco Dumont', 11),
(1861, 'Francisco Sá', 11),
(1862, 'Franciscópolis', 11),
(1863, 'Frei Gaspar', 11),
(1864, 'Frei Inocêncio', 11),
(1865, 'Frei Lagonegro', 11),
(1866, 'Fronteira', 11),
(1867, 'Fronteira dos Vales', 11),
(1868, 'Fruta de Leite', 11),
(1869, 'Frutal ', 11),
(1870, 'Funilândia', 11),
(1871, 'Galiléia', 11),
(1872, 'Gameleiras', 11),
(1873, 'Glaucilândia', 11),
(1874, 'Goiabeira', 11),
(1875, 'Goianá', 11),
(1876, 'Gonçalves', 11),
(1877, 'Gonzaga', 11),
(1878, 'Gouveia', 11),
(1879, 'Governador Valadares', 11),
(1880, 'Grão Mogol', 11),
(1881, 'Grupiara', 11),
(1882, 'Guanhães', 11),
(1883, 'Guapé', 11),
(1884, 'Guaraciaba', 11),
(1885, 'Guaraciama', 11),
(1886, 'Guaranésia', 11),
(1887, 'Guarani', 11),
(1888, 'Guarará', 11),
(1889, 'Guarda-Mor', 11),
(1890, 'Guaxupé', 11),
(1891, 'Guidoval', 11),
(1892, 'Guimarânia', 11),
(1893, 'Guiricema', 11),
(1894, 'Gurinhatã', 11),
(1895, 'Heliodora', 11),
(1896, 'Iapu', 11),
(1897, 'Ibertioga', 11),
(1898, 'Ibiá', 11),
(1899, 'Ibiaí', 11),
(1900, 'Ibiracatu', 11),
(1901, 'Ibiraci', 11),
(1902, 'Ibirité', 11),
(1903, 'Ibitiúra de Minas', 11),
(1904, 'Ibituruna', 11),
(1905, 'Icaraí de Minas', 11),
(1906, 'Igarapé', 11),
(1907, 'Igaratinga', 11),
(1908, 'Iguatama', 11),
(1909, 'Ijaci', 11),
(1910, 'Ilicénea', 11),
(1911, 'Imbé de Minas', 11),
(1912, 'Inconfidentes', 11),
(1913, 'Indaiabira', 11),
(1914, 'Indianópolis', 11),
(1915, 'Ingaú', 11),
(1916, 'Inhapim', 11),
(1917, 'Inhaúma', 11),
(1918, 'Inimutaba', 11),
(1919, 'Ipaba', 11),
(1920, 'Ipanema', 11),
(1921, 'Ipatinga', 11),
(1922, 'Ipiaçu', 11),
(1923, 'Ipuiúna', 11),
(1924, 'Iraí de Minas', 11),
(1925, 'Itabira', 11),
(1926, 'Itabirinha de Mantena', 11),
(1927, 'Itabirito', 11),
(1928, 'Itacambira', 11),
(1929, ' Itacarambi', 11),
(1930, 'Itaguara', 11),
(1931, 'Itaipé', 11),
(1932, 'Itajubá', 11),
(1933, 'Itamarandiba', 11),
(1934, 'Itamarati de Minas', 11),
(1935, 'Itambacuri', 11),
(1936, 'Itambé do Mato Dentro', 11),
(1937, 'Itamogi', 11),
(1938, 'Itamonte', 11),
(1939, 'Itanhandu', 11),
(1940, 'Itanhomi', 11),
(1941, 'Itaobim', 11),
(1942, 'Itapagipe', 11),
(1943, 'Itapecerica', 11),
(1944, 'Itapeva', 11),
(1945, 'Itatiaiuçu', 11),
(1946, 'Itaú de Minas', 11),
(1947, 'Itaúna', 11),
(1948, 'Itaverava', 11),
(1949, 'Itinga', 11),
(1950, 'Itueta', 11),
(1951, 'Ituiutaba', 11),
(1952, 'Itumirim', 11),
(1953, 'Iturama', 11),
(1954, 'Itutinga', 11),
(1955, 'Jaboticatubas', 11),
(1956, 'Jacinto', 11),
(1957, 'JacuÃ', 11),
(1958, 'Jacutinga', 11),
(1959, 'JaguaraÃ§u', 11),
(1960, 'Jaíba', 11),
(1961, 'Jampruca', 11),
(1962, 'Janaúba', 11),
(1963, 'Januária', 11),
(1964, 'Japaraíba', 11),
(1965, 'Japonvar', 11),
(1966, 'Jeceaba', 11),
(1967, 'Jenipapo de Minas', 11),
(1968, 'Jequeri', 11),
(1969, 'JequitaÃ', 11),
(1970, 'Jequitibá', 11),
(1971, 'Jequitinhonha', 11),
(1972, 'JesuÃ ¢nia', 11),
(1973, 'Joaíma', 11),
(1974, 'Joanésia', 11),
(1975, 'João Monlevade', 11),
(1976, 'João Pinheiro ', 11),
(1977, 'Joaquim Felício', 11),
(1978, 'Jordânia', 11),
(1979, 'José Gonçalves de Minas', 11),
(1980, 'José Raydan', 11),
(1981, 'Josenópolis', 11),
(1982, 'Juatuba', 11),
(1983, 'Juiz de Fora', 11),
(1984, 'Juramento', 11),
(1985, 'Juruaia', 11),
(1986, 'Juvenília', 11),
(1987, 'Ladainha', 11),
(1988, 'Lagamar', 11),
(1989, 'Lagoa da Prata', 11),
(1990, 'Lagoa dos Patos', 11),
(1991, 'Lagoa Dourada', 11),
(1992, 'Lagoa Formosa', 11),
(1993, ' Lagoa Grande', 11),
(1994, 'Lagoa Santa', 11),
(1995, 'Lajinha', 11),
(1996, 'Lambari', 11),
(1997, 'Lamim', 11),
(1998, 'Laranjal', 11),
(1999, 'Lassance', 11),
(2000, 'Lavras', 11),
(2001, 'Leandro Ferreira', 11),
(2002, 'Leme do Prado', 11),
(2003, 'Leopoldina', 11),
(2004, 'Liberdade', 11),
(2005, 'Lima Duarte', 11),
(2006, 'Limeira do Oeste', 11),
(2007, 'Lontra', 11),
(2008, 'Luisburgo', 11),
(2009, 'Luislândia', 11),
(2010, 'Luminá rias', 11),
(2011, 'Luz', 11),
(2012, 'Machacalis', 11),
(2013, 'Machado', 11),
(2014, 'Madre de Deus de Minas', 11),
(2015, 'Malacacheta', 11),
(2016, 'Mamonas', 11),
(2017, 'Mangá', 11),
(2018, 'Manhuaçu', 11),
(2019, 'Manhumirim', 11),
(2020, 'Mantena', 11),
(2021, 'Mar de Espanha', 11),
(2022, 'Maravilhas', 11),
(2023, 'Maria da Fé', 11),
(2024, 'Mariana', 11),
(2025, 'Marilac', 11),
(2026, 'Mário Campos', 11),
(2027, 'Maripá de Minas', 11),
(2028, 'Marliéria', 11),
(2029, 'Marmelópolis', 11),
(2030, 'Martinho Campos', 11),
(2031, ' Martins Soares', 11),
(2032, 'Mata Verde', 11),
(2033, 'Materlândia', 11),
(2034, 'Mateus Leme', 11),
(2035, 'Mathias Lobato', 11),
(2036, 'Matias Barbosa', 11),
(2037, 'Matias Cardoso', 11),
(2038, 'Matipó', 11),
(2039, 'Mato Verde', 11),
(2040, 'Matozinhos ', 11),
(2041, 'Matutina', 11),
(2042, 'Medeiros', 11),
(2043, 'Medina', 11),
(2044, 'Mendes Pimentel', 11),
(2045, 'Mercês', 11),
(2046, 'Mesquita', 11),
(2047, 'Minas Novas', 11),
(2048, 'Minduri', 11),
(2049, 'Mirabela', 11),
(2050, 'Miradouro', 11),
(2051, 'MiraÃ', 11),
(2052, 'Miravânia', 11),
(2053, 'Moeda', 11),
(2054, 'Moema', 11),
(2055, 'Monjolos', 11),
(2056, 'Monsenhor Paulo', 11),
(2057, 'Montalvânia ', 11),
(2058, 'Monte Alegre de Minas', 11),
(2059, 'Monte Azul', 11),
(2060, 'Monte Belo', 11),
(2061, 'Monte Carmelo', 11),
(2062, 'Monte Formoso', 11),
(2063, 'Monte Santo de Minas', 11),
(2064, 'Monte Sião', 11),
(2065, 'Montes Claros', 11),
(2066, 'Montezuma', 11),
(2067, 'Morada Nova de Minas', 11),
(2068, 'Morro da Garça', 11),
(2069, 'Morro do Pilar', 11),
(2070, 'Munhoz ', 11),
(2071, 'Muriaé', 11),
(2072, 'Mutum', 11),
(2073, 'Muzambinho', 11),
(2074, 'Nacip Raydan', 11),
(2075, 'Nanuque', 11),
(2076, 'Naque', 11),
(2077, 'Natalândia', 11),
(2078, 'Natércia', 11),
(2079, 'Nazareno', 11),
(2080, 'Nepomuceno', 11),
(2081, 'Ninheira', 11),
(2082, 'Nova Belém', 11),
(2083, 'Nova Era', 11),
(2084, 'Nova Lima', 11),
(2085, 'Nova Módica', 11),
(2086, 'Nova Ponte', 11),
(2087, 'Nova Porteirinha', 11),
(2088, 'Nova Resende', 11),
(2089, 'Nova Serrana', 11),
(2090, 'Nova União', 11),
(2091, 'Novo Cruzeiro', 11),
(2092, ' Novo Oriente de Minas', 11),
(2093, 'Novorizonte', 11),
(2094, 'Olaria', 11),
(2095, 'Olhos-d`Água', 11),
(2096, 'Olímpio Noronha ', 11),
(2097, 'Oliveira', 11),
(2098, 'Oliveira Fortes', 11),
(2099, 'Onça de Pitangui', 11),
(2100, 'Oratórios', 11),
(2101, 'Orizânia', 11),
(2102, 'Ouro Branco', 11),
(2103, 'Ouro Fino', 11),
(2104, 'Ouro Preto', 11),
(2105, 'Ouro Verde de Minas', 11),
(2106, 'Padre Carvalho', 11),
(2107, 'Padre Paraíso', 11),
(2108, 'Pai Pedro', 11),
(2109, 'Paineiras', 11),
(2110, 'Dores', 11),
(2111, 'Paiva', 11),
(2112, 'Palma', 11),
(2113, 'Palmópolis', 11),
(2114, 'Papagaios', 11),
(2115, 'Pará de Minas', 11),
(2116, 'Paracatu', 11),
(2117, 'Paraguaçu u', 11),
(2118, 'Paraisópolis', 11),
(2119, 'Paraopeba', 11),
(2120, 'Passa Quatro', 11),
(2121, 'Passa Tempo', 11),
(2122, 'Passabém', 11),
(2123, 'Passa-Vinte', 11),
(2124, 'Passos', 11),
(2125, 'Patis', 11),
(2126, 'Patos de Minas', 11),
(2127, 'Patrocínio', 11),
(2128, 'Patrocínio do Muriaé', 11),
(2129, 'Paula Cândido', 11),
(2130, 'Paulistas', 11),
(2131, 'Pavão', 11),
(2132, 'Pedra', 11),
(2133, 'Pedra Azul', 11),
(2134, 'Pedra Bonita', 11),
(2135, 'Pedra do Anta', 11),
(2136, 'Pedra do Indaiá', 11),
(2137, 'Pedra Dourada', 11),
(2138, 'Pedralva', 11),
(2139, 'Pedras de Maria da Cruz', 11),
(2140, 'Pedrinópolis', 11),
(2141, 'Pedro Leopoldo', 11),
(2142, 'Pedro Teixeira', 11),
(2143, 'Pequeri', 11),
(2144, 'Pequi', 11),
(2145, 'Perdigão', 11),
(2146, 'Perdizes', 11),
(2147, 'Perdões', 11),
(2148, 'Periquito', 11),
(2149, 'Pescador', 11),
(2150, 'Piau', 11),
(2151, 'Piedade de Caratinga', 11),
(2152, 'Piedade de Ponte Nova', 11),
(2153, 'Piedade do Rio Grande', 11),
(2154, 'Piedade dos Gerais', 11),
(2155, 'Pimenta', 11),
(2156, 'Pingo-d`água', 11),
(2157, 'Pintópolis', 11),
(2158, 'Piracema', 11),
(2159, 'Pirajuba ', 11),
(2160, 'Piranga', 11),
(2161, 'Piranguçu', 11),
(2162, 'Piranguinho', 11),
(2163, 'Pirapetinga', 11),
(2164, 'Pirapora', 11),
(2165, 'Piraúba', 11),
(2166, 'Pitangui', 11),
(2167, 'Piumhi', 11),
(2168, 'Planura', 11),
(2169, 'Poço Fundo', 11),
(2170, 'Poços de Caldas', 11),
(2171, 'Pocrane', 11),
(2172, 'Pompéu', 11),
(2173, 'Ponte Nova', 11),
(2174, 'Ponto Chique', 11),
(2175, 'Ponto dos Volantes', 11),
(2176, ' Porteirinha', 11),
(2177, 'Porto Firme', 11),
(2178, 'Poté', 11),
(2179, 'Pouso Alegre', 11),
(2180, 'Pouso Alto', 11),
(2181, 'Prados', 11),
(2182, 'Prata', 11),
(2183, 'Pratápolis', 11),
(2184, 'Pratinha', 11),
(2185, 'Presidente Bernardes', 11),
(2186, 'Presidente Juscelino', 11),
(2187, 'Presidente Kubitschek', 11),
(2188, 'Presidente Olegário', 11),
(2189, 'Prudente de Morais', 11),
(2190, 'Quartel Geral', 11),
(2191, 'Queluzito', 11),
(2192, 'Raposos', 11),
(2193, 'Raul Soares', 11),
(2194, 'Recreio', 11),
(2195, 'Reduto', 11),
(2196, 'Resende Costa', 11),
(2197, 'Resplendor', 11),
(2198, 'Ressaquinha', 11),
(2199, 'Riachinho', 11),
(2200, 'Riacho dos Machados', 11),
(2201, 'Ribeirão o das Neves', 11),
(2202, 'Ribeirão Vermelho', 11),
(2203, 'Rio Acima', 11),
(2204, 'Rio Casca', 11),
(2205, 'Rio do Prado ', 11),
(2206, 'Rio Doce', 11),
(2207, 'Rio Espera', 11),
(2208, 'Rio Manso', 11),
(2209, 'Rio Novo', 11),
(2210, 'Rio Paranaíba', 11),
(2211, 'Rio Pardo de Minas', 11),
(2212, 'Rio Piracicaba', 11),
(2213, 'Rio Pomba', 11),
(2214, 'Rio Preto', 11),
(2215, 'Rio Vermelho', 11),
(2216, 'Ritápolis', 11),
(2217, 'Rochedo de Minas', 11),
(2218, 'Rodeiro', 11),
(2219, 'Romaria', 11),
(2220, 'Rosário da Limeira', 11),
(2221, 'Rubelita', 11),
(2222, 'Rubim', 11),
(2223, 'Sabará', 11),
(2224, 'Sabinópolis', 11),
(2225, 'Sacramento', 11),
(2226, 'Salinas', 11),
(2227, 'Salto da Divisa', 11),
(2228, 'Santa Bárbara', 11),
(2229, 'Santa Bárbara do Leste', 11),
(2230, 'Santa Bárbara do Monte Verde', 11),
(2231, 'Santa Bárbara do Tugúrio', 11),
(2232, 'Santa Cruz de Minas', 11),
(2233, 'Santa Cruz de Salinas', 11),
(2234, 'Santa Cruz do Escalvado', 11),
(2235, 'Santa Efigênia de Minas', 11),
(2236, 'Santa Fé de Minas', 11),
(2237, 'Santa Helena de Minas', 11),
(2238, 'Santa Juliana', 11),
(2239, 'Santa Luzia', 11),
(2240, 'Santa Margarida', 11),
(2241, 'Santa Maria de Itabira', 11),
(2242, 'Santa Maria do Salto', 11),
(2243, 'Santa Maria do Suaçuí', 11),
(2244, 'Santa Rita de Caldas', 11),
(2245, 'Santa Rita de Ibitipoca', 11),
(2246, 'Santa Rita de Jacutinga', 11),
(2247, 'Santa Rita de Minas', 11),
(2248, 'Santa Rita do Itueto', 11),
(2249, 'Santa Rita do Sapucaí', 11),
(2250, 'Santa Rosa da Serra', 11),
(2251, 'Santa Vitória', 11),
(2252, 'Santana da Vargem', 11),
(2253, 'Santana de Cataguases', 11),
(2254, 'Santana de Pirapama', 11),
(2255, 'Santana do Deserto', 11),
(2256, 'Santana do Garambéu', 11),
(2257, 'Santana do Jacaré', 11),
(2258, 'Santana do Manhuaçu', 11),
(2259, 'Santana do Paraíso', 11),
(2260, 'Santana do Riacho', 11),
(2261, 'Santana dos Montes', 11),
(2262, 'Santo Antônio do Amparo', 11),
(2263, 'Santo Antônio do Aventureiro', 11),
(2264, 'Santo Antônio do Grama', 11),
(2265, 'Santo Antônio do Itambé', 11),
(2266, 'Santo Antônio do Jacinto', 11),
(2267, 'Santo António do Monte', 11),
(2268, 'Santo António do Retiro', 11),
(2269, 'Santo António do Rio Abaixo', 11),
(2270, ' Santo Hipólito', 11),
(2271, 'Santos Dumont', 11),
(2272, 'São Bento Abade', 11),
(2273, 'São Brás do Suaçu', 11),
(2274, 'São Domingos das Dores', 11),
(2275, 'São Domingos do Prata', 11),
(2276, 'São Félix de Minas', 11),
(2277, 'São Francisco', 11),
(2278, 'São Francisco de Paula', 11),
(2279, 'São Francisco de Sales', 11),
(2280, 'São Francisco do Glória', 11),
(2281, 'São Geraldo', 11),
(2282, 'São Geraldo da Piedade', 11),
(2283, 'São Geraldo do Baixio', 11),
(2284, 'São Gonçalo do Abaeté', 11),
(2285, 'São Gonçalo do Pará', 11),
(2286, 'São Gonçalo do Rio Abaixo', 11),
(2287, 'São Gonçalo do Rio Preto', 11),
(2288, 'São Gonçalo do Sapucaí', 11),
(2289, 'São Gotardo', 11),
(2290, 'São João Batista do Glória', 11),
(2291, 'São João da Lagoa', 11),
(2292, 'São João da Mata', 11),
(2293, 'São João da Ponte', 11),
(2294, 'São João das Missões', 11),
(2295, 'São João del Rei ', 11),
(2296, 'São João do Manhuaçu', 11),
(2297, 'São João do Manteninha', 11),
(2298, 'São João o do Oriente', 11),
(2299, 'São João do Pacuí', 11),
(2300, 'São João do Paraíso', 11),
(2301, 'São João Evangelista', 11),
(2302, 'São João Nepomuceno', 11),
(2303, 'São Joaquim de Bicas', 11),
(2304, 'São José da Barra', 11),
(2305, 'São José da Lapa', 11),
(2306, ' São José da Safira', 11),
(2307, 'São José da Varginha', 11),
(2308, 'São José do Alegre', 11),
(2309, 'São o José do Divino', 11),
(2310, 'São José do Goiabal', 11),
(2311, 'São José do Jacuri', 11),
(2312, 'São José do Mantimento', 11),
(2313, 'São Lourenço', 11),
(2314, 'São Miguel do Anta', 11),
(2315, 'São Pedro da União', 11),
(2316, 'São Pedro do Suaçu', 11),
(2317, 'São Pedro dos Ferros', 11),
(2318, 'São Romão', 11),
(2319, 'São Roque de Minas', 11),
(2320, 'São £o Sebastião da Bela Vista', 11),
(2321, 'São Sebastião da Vargem Alegre', 11),
(2322, 'São Sebastião do Anta', 11),
(2323, 'São Sebastião do Maranhão', 11),
(2324, 'São Sebastião do Oeste', 11),
(2325, 'São Sebastião do Paraíso', 11),
(2326, 'São Sebastião do Rio Preto', 11),
(2327, 'São Sebastião do Rio Verde', 11),
(2328, 'São Thomé das Letras', 11),
(2329, 'São Tiago', 11),
(2330, 'São Tomás de Aquino', 11),
(2331, 'São Vicente de Minas', 11),
(2332, 'Sapucaã-Mirim', 11),
(2333, 'Sardoá', 11),
(2334, 'Sarzedo', 11),
(2335, 'Sem-Peixe', 11),
(2336, 'Senador Amaral', 11),
(2337, 'Senador Cortes', 11),
(2338, 'Senador Firmino ', 11),
(2339, 'Senador José Bento', 11),
(2340, 'Senador Modestino Gonçalves', 11),
(2341, 'Senhora de Oliveira', 11),
(2342, 'Senhora do Porto', 11),
(2343, 'Senhora dos Remédios', 11),
(2344, 'Sericita', 11),
(2345, 'Seritinga', 11),
(2346, 'Serra Azul de Minas', 11),
(2347, 'Serra da Saudade', 11),
(2348, 'Serra do Salitre', 11),
(2349, 'Serra dos Aimorés', 11),
(2350, 'Serrania', 11),
(2351, 'Serranópolis de Minas', 11),
(2352, 'Serranos', 11),
(2353, 'Serro', 11),
(2354, 'Sete Lagoas', 11),
(2355, 'Setubinha', 11),
(2356, 'Silveirânia', 11),
(2357, 'Silvianópolis', 11),
(2358, 'Simão Pereira', 11),
(2359, 'Simonesia', 11),
(2360, 'Sobrália', 11),
(2361, 'Soledade de Minas', 11),
(2362, 'Tabuleiro', 11),
(2363, 'Taiobeiras', 11),
(2364, 'Taparuba', 11),
(2365, 'Tapira', 11),
(2366, 'Tapiraí', 11),
(2367, 'Taquaraçu de Minas', 11),
(2368, 'Tarumirim', 11),
(2369, 'Teixeiras', 11),
(2370, 'Teófilo Otoni', 11),
(2371, 'Timóteo', 11),
(2372, 'Tiradentes', 11),
(2373, 'Tiros', 11),
(2374, 'Tocantins', 11),
(2375, 'Tocos do Moji', 11),
(2376, 'Toledo', 11),
(2377, 'Tombos', 11),
(2378, 'Três Corações', 11),
(2379, 'Três Marias', 11),
(2380, 'Três Pontas', 11),
(2381, 'Tumiritinga', 11),
(2382, 'Tupaciguara', 11),
(2383, 'Turmalina', 11),
(2384, 'Turvolândia', 11),
(2385, 'Ubá', 11),
(2386, 'Ubaí', 11),
(2387, 'Ubaporanga', 11),
(2388, 'Uberaba', 11),
(2389, 'Uberlândia', 11),
(2390, 'Umburatiba', 11),
(2391, 'Unaã', 11),
(2392, 'União de Minas', 11),
(2393, 'Uruana de Minas', 11),
(2394, 'Urucânia', 11),
(2395, 'Urucuia', 11),
(2396, 'Vargem Alegre', 11),
(2397, 'Vargem Bonita', 11),
(2398, 'Vargem Grande do Rio Pardo', 11),
(2399, 'Varginha', 11),
(2400, ' Varjão de Minas', 11),
(2401, 'Várzea da Palma', 11),
(2402, 'Varzelândia', 11),
(2403, 'Vazante', 11),
(2404, ' Verdelândia', 11),
(2405, 'Veredinha', 11),
(2406, 'Veríssimo', 11),
(2407, 'Vermelho Novo', 11),
(2408, 'Vespasiano', 11),
(2409, 'Viçosa', 11),
(2410, 'Vieiras', 11),
(2411, 'Virgem da Lapa', 11),
(2412, 'Virgínia', 11),
(2413, 'Virginópolis', 11),
(2414, 'Virgolândia', 11),
(2415, 'Visconde do Rio Branco', 11),
(2416, 'Volta Grande', 11),
(2417, 'Wenceslau Braz', 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `nome_estado` varchar(75) DEFAULT NULL,
  `uf` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `estados`
--

INSERT INTO `estados` (`id`, `nome_estado`, `uf`) VALUES
(1, 'Acre', 'AC'),
(2, 'Alagoas', 'AL'),
(3, 'Amazonas', 'AM'),
(4, 'Amapá', 'AP'),
(5, 'Bahia', 'BA'),
(6, 'Ceará', 'CE'),
(7, 'Distrito Federal', 'DF'),
(8, 'Espirito Santo', 'ES'),
(9, 'Goiás', 'GO'),
(10, 'Maranhão', 'MA'),
(11, 'Minas Gerais', 'MG'),
(12, 'Mato Grosso do Sul', 'MS'),
(13, 'Mato Grosso', 'MT'),
(14, 'Pará', 'PA'),
(15, 'Paraí­ba', 'PB'),
(16, 'Pernambuco', 'PE'),
(17, 'Piauí', 'PI'),
(18, 'Paraná', 'PR'),
(19, 'Rio de Janeiro', 'RJ'),
(20, 'Rio Grande do Norte', 'RN'),
(21, 'Rondônia', 'RO'),
(22, 'Roraima', 'RR'),
(23, 'Rio Grande do Sul', 'RS'),
(24, 'Santa Catarina', 'SC'),
(25, 'Sergipe', 'SE'),
(26, 'São Paulo', 'SP'),
(27, 'Tocantins', 'TO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `publicacoes`
--

CREATE TABLE `publicacoes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `texto` varchar(200) NOT NULL,
  `path` varchar(100) DEFAULT 'arquivos/semFotoPublicacao.jpg',
  `contato` varchar(100) NOT NULL,
  `pathUsuario` varchar(100) NOT NULL,
  `data` datetime DEFAULT current_timestamp(),
  `id_estado` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `publicacoes`
--

INSERT INTO `publicacoes` (`id`, `id_usuario`, `titulo`, `texto`, `path`, `contato`, `pathUsuario`, `data`, `id_estado`) VALUES
(33, 11, 'Teste', 'Doando cesta básica...', 'arquivos/652d968584de4.jpeg', 'WhatsApp: 31 994163270', '', '2023-10-16 17:01:09', 0),
(34, 11, 'teste', 'teste', 'arquivos/652daadebbf79.png', 'WhatsApp: 31 994163270', '', '2023-10-16 18:27:58', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `pathUsuario` varchar(100) DEFAULT 'arquivos/userDefault.png',
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `pathUsuario`, `id_estado`) VALUES
(10, 'Gabriel', 'gabriel@teste.com', '81dc9bdb52d04dc20036dbd8313ed055', 'arquivos/651f4ad2362df.png', 1565),
(11, 'CPwel', 'gabriel@teste', '202cb962ac59075b964b07152d234b70', 'arquivos/652763f33e429.png', 1770);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
