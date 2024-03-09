import java.util.HashMap;

public class CadEstado {
    public static void main(String[] args) {
        HashMap<String, Estado> estados = new HashMap<String, Estado>();

        Estado e1 = new Estado();
        e1.setNome("Paraná");
        e1.setCapital("Curitiba");
        e1.setRegiao("Sul");
        estados.put("PR",e1);

        Estado e2 = new Estado();
        e2.setNome("São Paulo");
        e2.setCapital("São Paulo");
        e2.setRegiao("Sudeste");
        estados.put("SP",e2);

        Estado e3 = new Estado();
        e3.setNome("Rio Grande do Sul");
        e3.setCapital("Porto Alegre");
        e3.setRegiao("Sul");
        estados.put("RS",e3);

        Estado e4 = new Estado();
        e4.setNome("Santa Catarina");
        e4.setCapital("Florianópolis");
        e4.setRegiao("Sul");
        estados.put("SC",e4);
        System.out.println("Estados armazenados" + estados);
        String pesquisando = "SP";
        System.out.println("Verificando se "+pesquisando+" existe..");

        if (estados.containsKey(pesquisando)){
            System.out.println(pesquisando+" existe");
        }else {
            System.out.println(pesquisando + "Nao existe");
        }
        System.out.println("Percorrendo as chaves");
        for (String chave : estados.keySet()){
            System.out.println(chave);

        }
        for (Estado es: estados.values()){
            System.out.println("\nNome: " + es.getNome());
            System.out.println("Regiao: " + es.getRegiao());
            System.out.println("Capital: " + es.getCapital());

        }





    }
}


