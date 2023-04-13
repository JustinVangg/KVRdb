using System.Collections;
using System.Collections.Generic;
using UnityEngine.Networking;
using UnityEngine;
using TMPro;

//Used video at this link: https://www.youtube.com/watch?v=SO6KLuz_S8M

public class DatabaseConnect : MonoBehaviour
{
    public TextMeshProUGUI username;
    public TextMeshProUGUI password;
    public TextMeshProUGUI email;

    public void PublicLogin()
    {
        StartCoroutine(Login(username.text, password.text));
    }

    public void ForgotPassword()
    {
        StartCoroutine(ForgotPassword(username.text, email.text));
    }

    IEnumerator Login(string username, string password)
    {
        WWWForm form = new WWWForm();
        form.AddField("LoginUser", username);
        form.AddField("LoginPass", password);

        using (UnityWebRequest www = UnityWebRequest.Post("https://kvrdbconnection.azurewebsites.net", form))
        {
            yield return www.SendWebRequest();

            if (www.result != UnityWebRequest.Result.Success)
            {
                Debug.Log(www.error);
            }
            else
            {
                Debug.Log(www.downloadHandler.text);
            }
        }
    }

    IEnumerator ForgotPassword(string email, string message)
    {
        WWWForm form = new WWWForm();
        form.AddField("email", email);
        form.AddField("message", message);

        using (UnityWebRequest www = UnityWebRequest.Post("https://kvrdbconnection.azurewebsites.net/ForgotPass.php", form))
        {
            yield return www.SendWebRequest();

            if (www.result != UnityWebRequest.Result.Success)
            {
                Debug.Log(www.error);
            }
            else
            {
                Debug.Log(www.downloadHandler.text);
            }
        }
    }
}
