import java.util.HashMap;

public class Dias {
    public static void main(String[] args) {
        HashMap<String , String> diasSemana = new HashMap<String, String>();


        diasSemana.put("SEG","Segunda-feira");
        diasSemana.put("TER","Terça-feira");
        diasSemana.put("QUA","Quarta-feira");
        diasSemana.put("QUI","Quinta-feira");
        diasSemana.put("SEX","Sexta-feira");
        diasSemana.put("SAB","Sabado");
        diasSemana.put("DOM","Domingo");


        // sobrescrevendo item
        diasSemana.put("SAB", "Sabadão");

        System.out.println("Monstrando o pares Armazenados");
        System.out.println(diasSemana);

        System.out.println("\nVerificando se um dia existe:");
        System.out.println("QUA existe? "+ diasSemana.containsKey("QUA"));
        System.out.println("ASD existe? "+ diasSemana.containsKey("ASD"));

        System.out.println("\nPegando um item a partir da chave: ");
        System.out.println("O valor da chave TER é: " + diasSemana.get("TER"));

        System.out.println("\nQuantidade de pares chave valor " + diasSemana.size());
        //Removendo
        String itemRemover = "SEG";
        System.out.println("Removendo o item "+ itemRemover);
        diasSemana.remove(itemRemover);

        System.out.println("\nQuantidade de pares chave valor " + diasSemana.size());

        //Percorrendo

        System.out.println("\nPercorrendo as chaves: ");

        for(String chave : diasSemana.keySet()){
            System.out.println(chave);
        }

        System.out.println("\nPercorrendo os valores");

        for(String valores : diasSemana.values()){
            System.out.println(valores);
        }

        System.out.println("\nPercorrendo os valores");

        System.out.println("\nRemovendo todos os pares...");
        diasSemana.clear();
        System.out.println("\nQuantidade de pares chave valor " + diasSemana.size());




    }


}
